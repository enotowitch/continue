<? 
require_once "DB.php";
session_start();


// if user logged in
	if(isset($_SESSION["user"]["id"])){

		$yet_liked = R::find('like', 'user_id = ?', [$_SESSION["user"]["id"]]);

		foreach($yet_liked as $yet_liked){
			$yet_liked_arr[] = $yet_liked["card_id"];
		} 

		// if the post has no likes from this user -> add like
		if(!in_array($_POST['card_id'], $yet_liked_arr)){
			
			$like = R::dispense('like');

			$like->card_id = $_POST['card_id'];
			$like->user_id = $_SESSION["user"]["id"];
			
			R::store($like);

		}
// ! delete like
		if(in_array($_POST['card_id'], $yet_liked_arr)){
			
			R::hunt('like', 'user_id = ? AND card_id = ?', [$_SESSION["user"]["id"], $_POST['card_id']]);

		}

		

	}




?> 