<?
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	function if_page($page, $echo, $else = NULL){

		$serv_page = $_SERVER['PHP_SELF'];

		if($serv_page == "$page"){
			echo "$echo";
		} else {
			echo "$else";
		}
	}

// date

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		 'y' => 'y',
		 'm' => 'mo',
		 'w' => 'w',
		 'd' => 'd',
		 'h' => 'h',
		 'i' => 'm',
		 's' => 's',
	);
	foreach ($string as $k => &$v) {
		 if ($diff->$k) {
			  $v = $diff->$k . $v . ($diff->$k > 1 ? '' : '');
		 } else {
			  unset($string[$k]);
		 }
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . '' : '1s';
}
// ! hidden_posts
function hidden_posts(){
	// prevent errors
	$hidden_arr = array();
	// ! hidden
	$hidden = R::find('hidden', 'user_id = ?', [$_SESSION["user"]["id"]]);
	foreach($hidden as $hidden){
		$hidden_arr[] = $hidden["card_id"];
	}	
	return $hidden_arr;
}
// ! applied_posts
function applied_posts(){
	// prevent errors
	$applied_arr = array();
	// ! applied
	$applied = R::find('applied', 'user_id = ?', [$_SESSION["user"]["id"]]);
	foreach($applied as $applied){
		$applied_arr[] = $applied["card_id"];
	}
	return $applied_arr;
}
// ! throw_hidden_and_applied
function throw_hidden_and_applied($target_arr){
	$hidden_arr = hidden_posts();
	$applied_arr = applied_posts();

	$result = array_values(array_diff($target_arr, $hidden_arr, $applied_arr));
	return $result;
}
// ! load_all_num_posts (load-more 10)
function load_all_num_posts($cat){
		
		$posts = R::find('post', 'cat = ?', [$cat], 'ORDER BY id DESC');
		foreach($posts as $post){
			$all_arr[] = $post["id"];
		}

		$result = throw_hidden_and_applied($all_arr);
		// filtered posts
		$result_10 = array();
		for ($i=0; $i<=9; $i++) { 
			if($result[$i] != NULL){
				$result_10[] = $result[$i];
			}
		}
		$posts = R::loadAll('post', $result_10);
		return $posts;
}
// ! load_all_posts
function load_all_posts($cat){
	// prevent errors
	$hidden_arr = array();
	$applied_arr = array();

	
	$posts = R::find('post', 'cat = ?', [$cat], 'ORDER BY id DESC');
	foreach($posts as $post){
		$all_arr[] = $post["id"];
	}

	$result = throw_hidden_and_applied($all_arr);
	// filtered posts
	$posts = R::loadAll('post', $result);
	return $posts;
}

// ! load_my_posts
function load_my_posts($cat){
	$posts = R::find('post', 'user_id = ? AND cat = ?', [$_SESSION["user"]["id"], $cat], 'ORDER BY id DESC');
	return $posts;
}
// ! load_my_num_posts
function load_my_num_posts($cat){
	$posts = R::find('post', 'user_id = ? AND cat = ?', [$_SESSION["user"]["id"], $cat], 'ORDER BY id DESC LIMIT 10');
	return $posts;
}
// ! load_all_applications
function load_all_applications($cat){
	// ! find all applications
	$my_msg = R::getAll( 'SELECT apply_id FROM message WHERE user_to_id = :user_to_id AND applied_to_cat = :applied_to_cat',
	[':user_to_id' => $_SESSION["user"]["id"], ':applied_to_cat' => $cat]
	);
	$my_msg_arr = array();
	foreach($my_msg as $my_msg){
		$my_msg_arr[] = $my_msg["apply_id"];
	}
	$my_msg_arr = array_unique($my_msg_arr);
	// ! load posts
	$post = R::loadAll('post', $my_msg_arr);

	$post = throw_hidden_and_applied($post);
	foreach($post as $post){
		$load_all[] = $post["id"];
	}

	$post = R::loadAll('post', $load_all);
	return $post;
}
// ! load_num_applications
function load_num_applications($cat = NULL){
	if($_SERVER["PHP_SELF"] == '/messages.php'){
		$cat = 'folio';
	}
	if($_SERVER["PHP_SELF"] == '/messages-folios.php'){
		$cat = 'job';
	}
		// ! find all applications
		$my_msg = R::getAll( 'SELECT apply_id,applied_to_card FROM message WHERE user_to_id = :user_to_id AND applied_to_cat = :applied_to_cat',
		[':user_to_id' => $_SESSION["user"]["id"], ':applied_to_cat' => $cat]
		);
		$my_msg_arr = array();
		$my_msg_applied_to_card = array();
		foreach($my_msg as $my_msg){
			$my_msg_arr[] = $my_msg["apply_id"];
			$my_msg_applied_to_card[] = $my_msg["applied_to_card"];
		}
		$my_msg_arr = array_unique($my_msg_arr);
		$my_msg_applied_to_card = array_values(array_unique($my_msg_applied_to_card));
		// ! load posts
		$post = R::loadAll('post', $my_msg_arr);
	
		$post_10 = array();
		$i = 0;
		foreach($post as $post){
			if($i <= 9)
			$post_10[] = $post["id"];
			$i++;
		}
	
		$post = throw_hidden_and_applied($post_10);
	
		$post = R::loadAll('post', $post);
		return array($post, $my_msg_applied_to_card);
}

function generatePassword($length = 8) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$count = mb_strlen($chars);

	for ($i = 0, $result = ''; $i < $length; $i++) {
		 $index = rand(0, $count - 1);
		 $result .= mb_substr($chars, $index, 1);
	}

	return $result;
}

function mailer($user_mail, $text){

	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'PHPMailer/src/Exception.php';


	$mail = new PHPMailer();
	$mail->isSMTP();                   
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->SMTPAuth   = true;
	$mail->Username   = 'en.enotowitch4';
	$mail->Password   = 'qwerty123Q_';
	$mail->SMTPSecure = 'ssl';
	$mail->Port   = 465;

	$mail->setFrom('en.enotowitch4@gmail.com', '1 click apply, Remote Jobs!'); // from
	$mail->addAddress($user_mail, ''); // to

	$mail->Subject = '1 click apply, Remote Jobs!';
	$mail->msgHTML($text);
		// Sending
		if ($mail->send()) {
			// echo 'Email Sent!';
		 } else {
			echo 'Error: ' . $mail->ErrorInfo;
		 }
}

function test_post($user_id, $title, $subt, $salary, $duration, $experience, $workload, $location, $tag_1, $tag_2, $tag_3, $time, $cat){

$post = R::dispense("post");
// ! user must exist
$post->user_id = $user_id;
$post->title = $title;
$post->subt = $subt;
$post->salary = $salary;
$post->duration = $duration;
$post->experience = $experience;
$post->workload = $workload;
$post->location = $location;
$post->tag_1 = $tag_1;
$post->tag_2 = $tag_2;
$post->tag_3 = $tag_3;
$post->time = $time;		
$post->cat = $cat;
// !!! pics must exist (logo1 + example 1-10)
$post->logo = "img/test/" . "logo".random_int(1, 14).".jpg";
for($i=1;$i<=10;$i++){
	$post["example_$i"] = "img/test/" . "example".random_int(1, 90).".jpg";
}
R::store($post);

}
// ! render_cards_json
function render_cards_json($posts){
	$i = 0;

foreach($posts as $post){
	if($post['id'] != NULL){
	$posted = $post->time;
	$posted = date('Y-m-d H:i:s', $posted);

	$json[$i]["id"] = $post['id'];
	$json[$i]["title"] = $post['title'];
	$json[$i]["subt"] = $post['subt'];
	$json[$i]["salary"] = $post['salary'];
	$json[$i]["duration"] = $post['duration'];
	$json[$i]["experience"] = $post['experience'];
	$json[$i]["workload"] = $post['workload'];
	$json[$i]["location"] = $post['location'];
	$json[$i]["tag_1"] = $post['tag_1'];
	$json[$i]["tag_2"] = $post['tag_2'];
	$json[$i]["tag_3"] = $post['tag_3'];
	$json[$i]["logo"] = $post['logo'];
	for($ex=1;$ex<=10;$ex++){ 
		$json[$i]["example_$ex"] = $post["example_$ex"];
	}
	$json[$i]["user_id"] = $post['user_id'];
	$json[$i]["time"] = time_elapsed_string($posted);
	$json[$i]["cat"] = $post['cat'];

	$json[$i]["current_user"] = $_SESSION["user"]["id"];

	$json[$i]["size"] = $_COOKIE["size"];
	$i++;
	}	
}
echo json_encode($json);
}
function load_10($posts, $last_card_id){
	foreach($posts as $post){
		$posts_id[] = $post["id"];
	}
		
	// find post key -> if false ++ to search next nearest post
	$n = -1;
	while($key == false){
		$key = array_search($last_card_id+$n, $posts_id);
		$n++;
	}
	
	for($i = 0;$i<=9;$i++){
		$load_10[] = $posts_id[$key+$i];
	}
	$posts = R::loadAll('post', $load_10);

	return $posts;
}
?>