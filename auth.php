<? 
session_start();
require_once "DB.php";

$user_form_from = $_POST['user_form_from'];

$user_mail = $_POST["user_mail"];
$user_pass = $_POST["user_pass"];

if($user_form_from == "/reg.php"){
	
	$user = R::dispense('user');

	$user->user_mail = $user_mail; 
	$user->user_pass = md5($user_pass); 

	R::store($user);
}

if($user_form_from == "/login.php"){

	$check_user = R::findOne('user', 'user_mail = ?', [$user_mail]);


	if($check_user["user_pass"] == md5($user_pass)){
		$_SESSION["user"] = [
			"id" => $check_user["id"],
			"mail" => $check_user["user_mail"]
		];
	}

	var_dump($_SESSION["user"]["mail"]);
}


?>