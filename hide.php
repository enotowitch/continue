<? 
require_once "DB.php";
session_start();


// if user logged in
	if(isset($_SESSION["user"]["id"])){

		$yet_hidden = R::find('hide', 'user_id = ?', [$_SESSION["user"]["id"]]);

		foreach($yet_hidden as $yet_hidden){
			$yet_hidden_arr[] = $yet_hidden["card_id"];
		} 

		// if the post has no likes from this user -> add like
		if(!in_array($_POST['card_id'], $yet_hidden_arr)){
			
			$hide = R::dispense('hide');

			$hide->card_id = $_POST['card_id'];
			$hide->user_id = $_SESSION["user"]["id"];

			$hide->cat = $_POST['cat'];
			
			R::store($hide);

		}
// ! delete like
		if(in_array($_POST['card_id'], $yet_hidden_arr)){
			
			R::hunt('hide', 'user_id = ? AND card_id = ?', [$_SESSION["user"]["id"], $_POST['card_id']]);

		}

		

	}




?> 