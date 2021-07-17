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

function load_all_posts($cat){
		// prevent errors
		$hidden_arr = array();
		$messaged_arr = array();

		
		$posts = R::find('post', 'cat = ?', [$cat], 'ORDER BY id DESC');
		foreach($posts as $post){
			$all_arr[] = $post["id"];
		}
		// ! hidden
		$hidden = R::find('hidden', 'user_id = ?', [$_SESSION["user"]["id"]]);
		foreach($hidden as $hidden){
			$hidden_arr[] = $hidden["card_id"];
		}		
		// ! messaged
		$messaged = R::find('messaged', 'user_id = ?', [$_SESSION["user"]["id"]]);
		foreach($messaged as $messaged){
			$messaged_arr[] = $messaged["card_id"];
		}	
		$result = array_diff($all_arr, $hidden_arr, $messaged_arr);
		// filtered posts
		$posts = R::loadAll('post', $result);
		return $posts;
}

function load_my_posts($cat){
	$posts = R::find('post', 'user_id = ? AND cat = ?', [$_SESSION["user"]["id"], $cat], 'ORDER BY id DESC');
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
?>