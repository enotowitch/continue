<? 
session_start();
require_once "DB.php";


// ! mesd = messaged -> show in profile who you mesd to (show post that was mesd)

// if user logged in
if(isset($_SESSION["user"]["id"])){

	$yet_mesd = R::find('messaged', 'user_id = ?', [$_SESSION["user"]["id"]]);

	foreach($yet_mesd as $yet_mesd){
		$yet_mesd_arr[] = $yet_mesd["card_id"];
	} 

	// if the post has no likes from this user -> add like
	if(!in_array($_POST['card_id'], $yet_mesd_arr)){
		
		$messaged = R::dispense('messaged');

		$messaged->card_id = $_POST['card_id'];
		$messaged->user_id = $_SESSION["user"]["id"];

		$messaged->cat = $_POST['cat'];
		
		R::store($messaged);

	}


}

?>