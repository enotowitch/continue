<?

	require "DB.php";

	// ! UPLOAD PICS
	$logo = "uploads/" . rand() .  $_FILES['logo']['name'];

	$example_1 = "uploads/" . rand() .  $_FILES['example_1']['name'];
	$example_2 = "uploads/" . rand() .  $_FILES['example_2']['name'];
	$example_3 = "uploads/" . rand() .  $_FILES['example_3']['name'];
	$example_4 = "uploads/" . rand() .  $_FILES['example_4']['name'];
	$example_5 = "uploads/" . rand() .  $_FILES['example_5']['name'];
	$example_6 = "uploads/" . rand() .  $_FILES['example_6']['name'];
	$example_7 = "uploads/" . rand() .  $_FILES['example_7']['name'];
	$example_8 = "uploads/" . rand() .  $_FILES['example_8']['name'];
	$example_9 = "uploads/" . rand() .  $_FILES['example_9']['name'];
	$example_10 = "uploads/" . rand() .  $_FILES['example_10']['name'];

	move_uploaded_file($_FILES['logo']['tmp_name'], $logo);

	if(isset($_FILES['example_1'])){
	move_uploaded_file($_FILES['example_1']['tmp_name'], $example_1);
	}
	if(isset($_FILES['example_2'])){
	move_uploaded_file($_FILES['example_2']['tmp_name'], $example_2);
	}
	if(isset($_FILES['example_3'])){
	move_uploaded_file($_FILES['example_3']['tmp_name'], $example_3);
	}
	if(isset($_FILES['example_4'])){
	move_uploaded_file($_FILES['example_4']['tmp_name'], $example_4);
	}
	if(isset($_FILES['example_5'])){
	move_uploaded_file($_FILES['example_5']['tmp_name'], $example_5);
	}
	if(isset($_FILES['example_6'])){
	move_uploaded_file($_FILES['example_6']['tmp_name'], $example_6);
	}
	if(isset($_FILES['example_7'])){
	move_uploaded_file($_FILES['example_7']['tmp_name'], $example_7);
	}
	if(isset($_FILES['example_8'])){
	move_uploaded_file($_FILES['example_8']['tmp_name'], $example_8);
	}
	if(isset($_FILES['example_9'])){
	move_uploaded_file($_FILES['example_9']['tmp_name'], $example_9);
	}
	if(isset($_FILES['example_10'])){
	move_uploaded_file($_FILES['example_10']['tmp_name'], $example_10);
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

	$tag_1 = $_POST['tag_1'];
	$tag_2 = $_POST['tag_2'];
	$tag_3 = $_POST['tag_3'];


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

		$post->logo = $logo;


		if(isset($_FILES['example_1'])){
		$post->example_1 = $example_1;
		}
		if(isset($_FILES['example_2'])){
		$post->example_2 = $example_2;
		}
		if(isset($_FILES['example_3'])){
		$post->example_3 = $example_3;
		}
		if(isset($_FILES['example_4'])){
		$post->example_4 = $example_4;
		}
		if(isset($_FILES['example_5'])){
		$post->example_5 = $example_5;
		}
		if(isset($_FILES['example_6'])){
		$post->example_6 = $example_6;
		}
		if(isset($_FILES['example_7'])){
		$post->example_7 = $example_7;
		}
		if(isset($_FILES['example_8'])){
		$post->example_8 = $example_8;
		}
		if(isset($_FILES['example_9'])){
		$post->example_9 = $example_9;
		}
		if(isset($_FILES['example_10'])){
		$post->example_10 = $example_10;
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

		$portfolio->logo = $logo;

	
		R::store( $portfolio );
		
	}

?>