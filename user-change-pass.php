<? 
session_start();

require_once "DB.php";
require_once "functions.php";

$pass = $_POST['new_pass'];
$user_mail = $_SESSION['user']['mail'];
$server_name = $_SERVER['SERVER_NAME'];

// ! json errors
$data = [
	'status' => false
];

// ! check form not empty
if($_POST["old_pass"] == '' || $_POST["new_pass"] == '' || $_POST["new_pass2"] == ''){
	$data['msg'] = ["All fields required!"];
	// don't color fields
	$data['field'] = ["old_pass123", "new_pass123", "new_pass222"];
	echo json_encode($data);
	die();
}

$user = R::find('user', 'user_mail = ?', [$_SESSION['user']['mail']]);
foreach($user as $user){
	$user_id = $user["id"];
	$user_pass = $user["user_pass"];
}
// ! check new pass = confirmed
if($_POST["new_pass"] == $_POST["new_pass2"]){
	if($user_pass == md5($_POST["old_pass"])){
		// ! store new pass
		$user = R::load('user', $user_id);
		$user->user_pass = md5($_POST["new_pass"]);
		R::store($user);
		// ! mailer
		mailer($_SESSION['user']['mail'], "<html><body>
		<h1>You changed password!</h1>
		<p>Your new password: $pass</p>
		<p><a href='$server_name/login.php?mail=$user_mail&pass=$pass&role=$role'>Your profile</a></p>
		</html></body>");
		// ? mailer
		// json OK
		$data = [
			'status' => true,
			'msg' => 'Password changed!'
		];
		echo json_encode($data);
	} else {
		$data['msg'] = ["old password is wrong!"];
		$data['field'] = ["old_pass"];
		echo json_encode($data);
		die();
	}
} else {
	$data['msg'] = ["passwords don\'t match!"];
	$data['field'] = ["new_pass2"];
	echo json_encode($data);
	die();
}


?>