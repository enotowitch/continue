<? 
session_start();
require_once "DB.php";
require_once "functions.php";

$user_form_from = $_POST['user_form_from'];

$user_mail = trim($_POST["user_mail"]);
$user_pass = trim($_POST["user_pass"]);
$reg_pass = generatePassword();
$role = $_POST["role"];
$server_name = $_SERVER["SERVER_NAME"];

// ! json errors
$data = [
	'status' => false
];
// ! validation 1 

$check_mail = R::findOne('user', 'user_mail = ?', [$user_mail]);

// ? check if mail already in use when REGISTER
if($user_form_from == "/reg.php" && $check_mail["user_mail"] == $user_mail && $user_mail != ""){
	$data['msg'] = ["Email already exists!"];
	$data['field'] = ["user_mail"];
	echo json_encode($data);
	die();
}

if($user_mail == ""){
	$data['msg'] = ["Please enter email!"];
	$data['field'] = ["user_mail"];
	echo json_encode($data);
	die();
}
if(!filter_var($user_mail, FILTER_VALIDATE_EMAIL)){
	$data['msg'] = ["Please enter valid email!"];
	$data['field'] = ["user_mail"];
	echo json_encode($data);
	die();
}
if($user_form_from == "/login.php" && $user_pass == ""){
	$data['msg'] = ["Please enter password!"];
	$data['field'] = ["user_pass"];
	echo json_encode($data);
	die();
}
if($user_form_from == "/reg.php" && $role == ''){
	$data['msg'] = ["Please choose role!"];
	$data['field'] = ["role"];
	echo json_encode($data);
	die();
}

// create "no-logo" in case user will not add logos to posts/folios
$first_mail_char = $user_mail[0];
switch($first_mail_char){
	case "$first_mail_char": $logo = 'img/no-logo/'."$first_mail_char".'.png';break;
}

// ! REG

if($user_form_from == "/reg.php"){

	// ! if mail is free => REG

	if($check_mail["user_mail"] != $user_mail){


		$user = R::dispense('user');

		$user->user_mail = $user_mail; 
		$user->user_pass = md5($reg_pass); 
		$user->user_logo = $logo;
	
		$user_id = R::store($user);

		$new_user = R::load('user', $user_id);

		// add user to session to skip login
		$_SESSION["user"] = [
			"id" => $new_user["id"],
			"mail" => $new_user["user_mail"],
			"logo" => $logo
		];

		$data = [
			'status' => true,
			'msg' => 'Registered successfully!'
			];

	} 

			// if user OK -> PHPMailer
			if($new_user){
				// ! mailer
				mailer($user_mail, "<html><body>
				<h1>You registered at <<1 click apply, <span style='color: #6fda44;'>Remote Jobs!</span>>></h1>
				<p>Your password: $reg_pass</p>
				<p><a href='$server_name/login.php?mail=$user_mail&pass=$reg_pass&role=$role'>Your profile</a></p>
				</html></body>");
				// ? mailer
			}

}

// ! login

if($user_form_from == "/login.php"){

	$check_user = R::findOne('user', 'user_mail = ?', [$user_mail]);

	if($check_user["user_mail"] == $user_mail && $check_user["user_pass"] != md5($user_pass)){
		$data['msg'] = ["Wrong password!"];
		$data['field'] = ["user_pass"];
	}

	if($check_user["user_mail"] != $user_mail){
		$data['msg'] = ["No such user!"];
		$data['field'] = ["user_mail"];
	}


	if($check_user["user_pass"] == md5($user_pass)){
		$_SESSION["user"] = [
			"id" => $check_user["id"],
			"mail" => $check_user["user_mail"],
			"logo" => $logo
		];

		$data = [
			'status' => true,
			'msg' => 'Welcome!'
			];
	} 

	
}

echo json_encode($data);

?>