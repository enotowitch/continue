<?
	session_start();
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


	if(isset($_FILES['logo'])){

	// ! delete old logo
	// delete img only if it's from UPLOADS
	if($update["logo"][0] == "u"){
		unlink($update["logo"]);
	}
	
	// ! upload new logo
	$logo_path = "uploads/" . rand() .  $_FILES['logo']['name'];
	move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path);
	
	// ! store new logo
	$update->logo = $logo_path;
		
	}

	// ! examples

	$examples_path = array();

	for($i=1;$i<=10;$i++){
		$examples_path[] = "uploads/" . rand() .  $_FILES["example_$i"]["name"];
	}

	for($i=1;$i<=10;$i++){

		// ! if atleast 1 uploaded -del all -update all(NULL) 
		if($_FILES["example_1"] != NULL){
			// todo
			unlink($update["example_$i"]);
			$update["example_$i"] = NULL;
		}
		// ! -> store uploaded 
		if($_FILES["example_$i"] != NULL){
			move_uploaded_file($_FILES["example_$i"]['tmp_name'], $examples_path[($i-1)]);
			$update["example_$i"] = $examples_path[($i-1)];
			}
	}



	R::store($update);

	

?>

