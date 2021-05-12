<? 
require_once "DB.php";
session_start();



	$like = R::dispense('like');

	$like->card_id = $_POST['card_id'];
	$like->user_id = $_SESSION["user"]["id"];

	R::store($like);


?> 