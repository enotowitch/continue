<? 
session_start();
require_once "DB.php";

if($_POST["current_user"] != ""){
	
	$cur_user = R::load('user', $_POST["current_user"]);

	$cur_user->size = $_POST["size"];

	R::store($cur_user);

}


?>