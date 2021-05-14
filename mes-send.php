<? 
session_start();
require_once "DB.php";

// 

if($_POST["user_from_msg"] != NULL){

	$message = R::dispense('message');

	$message->user_to_id = $_POST['user_to_id'];
	// use DEFAULT logo for messages 
	$message->user_from_logo = $_SESSION["user"]["logo"];
	
	$message->user_from_id = $_POST['user_from_id'];
	$message->user_from_mail = $_POST['user_from_mail'];
	$message->user_from_msg = $_POST['user_from_msg'];
	
	R::store($message);
	
}




?>