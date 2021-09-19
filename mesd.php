<? 
session_start();
require_once "DB.php";


// ! mesd = applied -> show in profile who you mesd to (show post that was mesd)

// if user logged in
if(isset($_SESSION["user"]["id"])){

	$yet_mesd = R::find('applied', 'user_id = ?', [$_SESSION["user"]["id"]]);

	foreach($yet_mesd as $yet_mesd){
		$yet_mesd_arr[] = $yet_mesd["card_id"];
	} 

	// if the post has no likes from this user -> add like
	if(!in_array($_POST['card_id'], $yet_mesd_arr)){
		
		$applied = R::dispense('applied');

		$applied->card_id = $_POST['card_id'];
		$applied->user_id = $_SESSION["user"]["id"];

		$applied->cat = $_POST['cat'];
		
		R::store($applied);

	}


}

?>