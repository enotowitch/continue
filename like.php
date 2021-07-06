<? 
require_once "DB.php";
session_start();


// if user logged in
	if(isset($_SESSION["user"]["id"])){

		$yet_liked = R::find('liked', 'user_id = ?', [$_SESSION["user"]["id"]]);

		foreach($yet_liked as $yet_liked){
			$yet_liked_arr[] = $yet_liked["card_id"];
		} 

		// if the post has no likes from this user -> add like
		if(!in_array($_POST['card_id'], $yet_liked_arr)){
			
			$liked = R::dispense('liked');

			$liked->card_id = $_POST['card_id'];
			$liked->user_id = $_SESSION["user"]["id"];

			$liked->cat = $_POST['cat'];
			
			R::store($liked);

		}
// ! delete like
		if(in_array($_POST['card_id'], $yet_liked_arr)){
			
			R::hunt('liked', 'user_id = ? AND card_id = ?', [$_SESSION["user"]["id"], $_POST['card_id']]);

		}

		

	}




?> 