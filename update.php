<? 
	var_dump($_POST);
	require_once "DB.php";

	
	$update = R::load('post', $_POST["card_id"]);

	$update->title = $_POST["title"];
	$update->subt = $_POST["subt"];

	$update->salary = $_POST["salary"];
	$update->duration = $_POST["duration"];
	$update->experience = $_POST["experience"];
	$update->workload = $_POST["workload"];
	$update->location = $_POST["location"];

	R::store($update);

	

?>

