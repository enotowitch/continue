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


	// 

	if($card_from == '/post-job.php'){

		$post = R::dispense('post');


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

		$post->logo = $logo_path;


		for($i=1;$i<=10;$i++){
			if(isset($_FILES["example_$i"])){
				$post["example_$i"] = $examples_path[($i-1)];
				}
		}
		
		R::store( $post );

	}

	if($card_from == '/post-portfolio.php'){

		$portfolio = R::dispense('portfolio');


		$portfolio->title = $title;
		$portfolio->subt = $subt;

		$portfolio->salary = $salary;
		$portfolio->duration = $duration;
		$portfolio->experience = $experience;
		$portfolio->workload = $workload;
		$portfolio->location = $location;

		$portfolio->tag_1 = $tag_1;
		$portfolio->tag_2 = $tag_2;
		$portfolio->tag_3 = $tag_3;

		$portfolio->logo = $logo_path;


		for($i=1;$i<=10;$i++){
			if(isset($_FILES["example_$i"])){
				$portfolio["example_$i"] = $examples_path[($i-1)];
				}
		}
		
		R::store( $portfolio );
		
	}

?>