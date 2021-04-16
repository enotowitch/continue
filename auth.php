<? 
session_start();
require_once "DB.php";

$user_form_from = $_POST['user_form_from'];

$user_mail = $_POST["user_mail"];
$user_pass = $_POST["user_pass"];

// ! reg

if($user_form_from == "/reg.php"){

	$check_mail = R::findOne('user', 'user_mail = ?', [$user_mail]);

	// ! not same mail

	if($check_mail["user_mail"] != $user_mail){
		$user = R::dispense('user');

		$user->user_mail = $user_mail; 
		$user->user_pass = md5($user_pass); 
	
		$user_id = R::store($user);

		$new_user = R::load('user', $user_id);


		$_SESSION["user"] = [
			"id" => $new_user["id"],
			"mail" => $new_user["user_mail"]
		];



	} else {
		print "USER MAIL ALREADY EXISTS!!!";
	}
	

}

// ! login

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