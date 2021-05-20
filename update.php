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

	$update->tag_1 = $_POST["tags"][0];
	$update->tag_2 = $_POST["tags"][1];
	$update->tag_3 = $_POST["tags"][2];

	R::store($update);

	

?>

