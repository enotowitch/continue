<? 
	// var_dump($_POST);
	require_once "DB.php";

	
	$update = R::load('post', $_POST["card_id"]);

	$update->title = $_POST["title"];
	$update->subt = $_POST["subt"];

	R::store($update);

	

?>

