<?
session_start();
require_once "DB.php";

	// ! upload pics
	
	$logo_path = "uploads/" . rand() .  $_FILES['logo']['name'];
	move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path);


	$examples_path = array();

	for($i=1;$i<=10;$i++){
		$examples_path[] = "uploads/" . rand() .  $_FILES["example_$i"]["name"];
		move_uploaded_file($_FILES["example_$i"]['tmp_name'], $examples_path[($i-1)]);
	}

	// ! vars

	
	$card_from = $_POST['card_from'];

	$user_id = $_POST['user_id'];

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


	// ! DB post/folio


		$post = R::dispense("post");


		$post->user_id = $user_id;

		$post->title = $title;
		$post->subt = $subt;

		$post->salary = $salary;
		$post->duration = $duration;
		$post->experience = $experience;
		$post->workload = $workload;
		$post->location = $location;

		$post->tag_1 = $tag_1;
		$post->tag_2 = $tag_2;
		$post->tag_3 = $tag_3;

		$post->time = time();
		
		$post->cat = $_POST["card_from"] == '/post-job.php' ? 'job' : 'folio';


		
		if(isset($_FILES['logo'])){
			
			$post->logo = $logo_path;
			
		} else {
// if no logo added -> logo = $_SESSION['user']['logo'] = first user_mail char
			$post->logo = $_SESSION['user']['logo'];
		}

		for($i=1;$i<=10;$i++){
			if(isset($_FILES["example_$i"])){
				$post["example_$i"] = $examples_path[($i-1)];
				}
		}
		
		R::store( $post );
		

?>