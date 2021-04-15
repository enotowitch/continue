<?

	require "DB.php";

	// ! UPLOAD PICS
	
	$logo_path = "uploads/" . rand() .  $_FILES['logo']['name'];
	move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path);


	$examples_path = array();

	for($i=1;$i<=10;$i++){
		$examples_path[] = "uploads/" . rand() .  $_FILES["example_$i"]["name"];
		move_uploaded_file($_FILES["example_$i"]['tmp_name'], $examples_path[($i-1)]);
	}

	// ? UPLOAD PICS

	
	$card_from = $_POST['card_from'];

	$title = $_POST['title'];
	$subt = $_POST['subt'];

	$salary = $_POST['salary'];
	$duration = $_POST['duration'];
	$experience = $_POST['experience'];
	$workload = $_POST['workload'];
	$location = $_POST['location'];

	$tag_1 = $_POST['tags'][0];
	$tag_2 = $_POST['tags'][1];
	$tag_3 = $_POST['tags'][2];


	// ! DB

	if($card_from == '/post-job.php'){
		$destination = "post";
	} else {
		$destination = "portfolio";
	}


		$destination = R::dispense("$destination");


		$destination->title = $title;
		$destination->subt = $subt;

		$destination->salary = $salary;
		$destination->duration = $duration;
		$destination->experience = $experience;
		$destination->workload = $workload;
		$destination->location = $location;

		$destination->tag_1 = $tag_1;
		$destination->tag_2 = $tag_2;
		$destination->tag_3 = $tag_3;

		$destination->logo = $logo_path;


		for($i=1;$i<=10;$i++){
			if(isset($_FILES["example_$i"])){
				$destination["example_$i"] = $examples_path[($i-1)];
				}
		}
		
		R::store( $destination );
		

?>