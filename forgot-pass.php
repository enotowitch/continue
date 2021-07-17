<?
require_once "DB.php";
require_once "functions.php";


$forgot_pass = generatePassword();
$user_mail = $_POST['mail'];
$server_name = $_SERVER["SERVER_NAME"];

// ! json errors
$data = [
	'status' => false
];


if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){

	// ! update & store
	$user = R::find('user', 'user_mail = ?', [$_POST['mail']]);

	// if such user exists
	if($user){
		foreach($user as $user){
			$user_id = $user['id'];
		}
		$user = R::load('user', $user_id);
		$user->user_pass = md5($forgot_pass);
		R::store($user);

		$data = [
			'status' => true,
			'msg' => 'New password sent to your email!'
		];
		echo json_encode($data);
	
		// ! mailer
		mailer($user_mail, "<html><body>
		<h1>You resetted the password!</h1>
		<p>Your NEW password: $forgot_pass</p>
		<p><a href='$server_name/login.php?mail=$user_mail&pass=$forgot_pass&role=$role'>Your profile</a></p>
		</html></body>");
		// ? mailer

	} else {
		$data['msg'] = ['No user with this Email!'];
		echo json_encode($data);
		die();
	}
	
}

?>