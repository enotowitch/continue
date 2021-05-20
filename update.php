<?
	session_start();
	require_once "DB.php";
	var_dump($_FILES);

	
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


	if(isset($_FILES['logo'])){

	// ! delete old logo
	unlink($update["logo"]);

	// ! upload new logo
	$logo_path = "uploads/" . rand() .  $_FILES['logo']['name'];
	move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path);
	
	// ! store new logo
	$update->logo = $logo_path;
		
	}

	R::store($update);

	

?>

