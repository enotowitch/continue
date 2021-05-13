<? 
session_start();
require_once "DB.php";

// ! mesd = messaged -> show in profile who you mesd to (show post that was mesd)

// if user logged in
if(isset($_SESSION["user"]["id"])){

	$yet_mesd = R::find('mesd', 'user_id = ?', [$_SESSION["user"]["id"]]);

	foreach($yet_mesd as $yet_mesd){
		$yet_mesd_arr[] = $yet_mesd["card_id"];
	} 

	// if the post has no likes from this user -> add like
	if(!in_array($_POST['card_id'], $yet_mesd_arr)){
		
		$mesd = R::dispense('mesd');

		$mesd->card_id = $_POST['card_id'];
		$mesd->user_id = $_SESSION["user"]["id"];
		
		R::store($mesd);

	}


	

}

// 

$message = R::dispense('message');

$message->user_to_id = $_POST['user_to_id'];
// use DEFAULT logo for messages 
$message->user_from_logo = $_SESSION["user"]["logo"];

$message->user_from_id = $_POST['user_from_id'];
$message->user_from_mail = $_POST['user_from_mail'];
$message->user_from_msg = $_POST['user_from_msg'];

R::store($message);


?>