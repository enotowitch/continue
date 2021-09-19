<? 
session_start();
require_once "DB.php";
var_dump($_POST);
// 

if($_POST["apply_id"] != "" || $_POST['user_from_msg'] != ""){

	$message = R::dispense('message');

	$message->apply_id = $_POST['apply_id'];
	$message->applied_to_card = $_POST["card_id"];
	$message->applied_to_cat = $_POST["card_from"] == '/index.php' ? 'job' : 'folio';
	$message->apply_title = $_POST['apply_title'];

	$message->user_to_id = $_POST['user_to_id'];
	// use DEFAULT logo for messages 
	$message->user_from_logo = $_SESSION["user"]["logo"];
	
	$message->user_from_id = $_POST['user_from_id'];
	$message->user_from_mail = $_POST['user_from_mail'];
	$message->user_from_msg = $_POST['user_from_msg'];
	
	R::store($message);
	
}




?>