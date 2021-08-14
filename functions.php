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
// ! messaged_posts
function messaged_posts(){
	// prevent errors
	$messaged_arr = array();
	// ! messaged
	$messaged = R::find('messaged', 'user_id = ?', [$_SESSION["user"]["id"]]);
	foreach($messaged as $messaged){
		$messaged_arr[] = $messaged["card_id"];
	}
	return $messaged_arr;
}
// ! load_all_num_posts (load-more 10)
function load_all_num_posts($cat){
		
		$posts = R::find('post', 'cat = ?', [$cat], 'ORDER BY id DESC');
		foreach($posts as $post){
			$all_arr[] = $post["id"];
		}
	
		$hidden_arr = hidden_posts();
		$messaged_arr = messaged_posts();

		$result = array_values(array_diff($all_arr, $hidden_arr, $messaged_arr));
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
	$messaged_arr = array();

	
	$posts = R::find('post', 'cat = ?', [$cat], 'ORDER BY id DESC');
	foreach($posts as $post){
		$all_arr[] = $post["id"];
	}

	$hidden_arr = hidden_posts();
	$messaged_arr = messaged_posts();		

	$result = array_diff($all_arr, $hidden_arr, $messaged_arr);
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
	$posts = R::find('post', 'user_id = ? AND cat = ?', [$_SESSION["user"]["id"], $cat], 'ORDER BY id DESC LIMIT 12');
	return $posts;
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
?>