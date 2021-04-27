<? 
session_start();
require_once "DB.php";

$user_form_from = $_POST['user_form_from'];

$user_mail = trim($_POST["user_mail"]);
$user_pass = trim($_POST["user_pass"]);

// ! json errors
$data = [
	'status' => false
];
// ! validation 1 

$check_mail = R::findOne('user', 'user_mail = ?', [$user_mail]);

// ? check if mail already in use when REGISTER
if($user_form_from == "/reg.php" && $check_mail["user_mail"] == $user_mail && $user_mail != ""){
	$data['msg'] = ["Email already exists!"];
	echo json_encode($data);
	die();
}

if($user_mail == ""){
	$data['msg'] = ["Please enter email!"];
	echo json_encode($data);
	die();
}
if(!filter_var($user_mail, FILTER_VALIDATE_EMAIL)){
	$data['msg'] = ["Please enter valid email!"];
	echo json_encode($data);
	die();
}
if($user_pass == ""){
	$data['msg'] = ["Please enter password!"];
	echo json_encode($data);
	die();
}
if($user_form_from == "/reg.php" && strlen($user_pass) < 6){
	$data['msg'] = ["Password: 5+ chars!"];
	echo json_encode($data);
	die();
}


// ! REG

if($user_form_from == "/reg.php"){

	// ! if mail is free => REG

	if($check_mail["user_mail"] != $user_mail){

		// create "no-logo" in case user will not add logos to posts/folios
		$first_mail_char = $user_mail[0];
		switch($first_mail_char){
			case "$first_mail_char": $logo = 'img/no-logo/'."$first_mail_char".'.png';break;
		}	

		$user = R::dispense('user');

		$user->user_mail = $user_mail; 
		$user->user_pass = md5($user_pass); 
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


}

// ! login

if($user_form_from == "/login.php"){

	$check_user = R::findOne('user', 'user_mail = ?', [$user_mail]);

	if($check_user["user_mail"] == $user_mail && $check_user["user_pass"] != md5($user_pass)){
		$data['msg'] = ["Wrong password!"];
	}

	if($check_user["user_mail"] != $user_mail){
		$data['msg'] = ["No such user!"];
	}


	if($check_user["user_pass"] == md5($user_pass)){
		$_SESSION["user"] = [
			"id" => $check_user["id"],
			"mail" => $check_user["user_mail"]
		];

		$data = [
			'status' => true,
			'msg' => 'Welcome!'
			];
	} 

	
}

echo json_encode($data);

?>