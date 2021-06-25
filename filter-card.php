<? 
 session_start();
 require_once "DB.php";

// prevent errors
$word_arr = array();
$company_arr = array();
$tags_arr = array();
$filter_arr = array();
$salary_arr = array();
$experience_arr = array();
$duration_arr = array();
$location_arr = array();
$workload_arr = array();

// !!! add to each search!
$search_counter = 0;



// ! location
if($_POST["search-location"] != 'location'){
	$location = R::getAll( 'SELECT * FROM post WHERE location = :location',
	[':location' => $_POST["search-location"]]
);

foreach($location as $location){
	$location_arr[] = $location["id"];
}
$search_counter++;
$final_arr[] = $location_arr;
}


// ! duration
if($_POST["search-duration"] != 'duration'){
	$duration = R::getAll( 'SELECT * FROM post WHERE duration = :duration',
	[':duration' => $_POST["search-duration"]]
);

foreach($duration as $duration){
	$duration_arr[] = $duration["id"];
}
$search_counter++;
$final_arr[] = $duration_arr;
}


// ! salary
if($_POST["search-salary"] != 'salary'){


	if($_POST["search-salary"] == '$1-$5/h'){
		$s1 = 1;
		$s2 = 5;
	}

	for($i=5;$i<=45;$i+=5){
		$i2 = $i + 5;
		// $5-$10 ... $10-$15 .. $15-$20 ... $45-$50/h
		if($_POST["search-salary"] == "$$i-$$i2/h"){
		$s1 = $i;
		$s2 = $i+5;
	}
	}

	for($i=50;$i<=95;$i+=10){
		$i2 = $i + 10;
		// $50-$60 ... $90-$100/h
		if($_POST["search-salary"] == "$$i-$$i2/h"){
		$s1 = $i;
		$s2 = $i+10;
	}
	}

	if($_POST["search-salary"] == "$100-$200/h"){
		$s1 = 100;
		$s2 = 200;
	}

	
		for ($i = $s1; $i <= $s2; $i++) {
			$salary = R::getAll( 'SELECT * FROM post WHERE salary = :salary',
			[':salary' => "$$i/h"]
			);
			foreach($salary as $salary){
				$salary_arr[] = $salary["id"];
			}
	  }

  $search_counter++;
  $final_arr[] = $salary_arr;
}

// ! workload
if($_POST["search-workload"] != 'workload'){
	
	if($_POST["search-workload"] == '1-40 h/mo'){
		$s1 = 1;
		$s2 = 40;
	}
	if($_POST["search-workload"] == '40-80 h/mo'){
		$s1 = 40;
		$s2 = 80;
	}
	if($_POST["search-workload"] == '80-120 h/mo'){
		$s1 = 80;
		$s2 = 120;
	}
	if($_POST["search-workload"] == '120-160 h/mo'){
		$s1 = 120;
		$s2 = 160;
	}
	if($_POST["search-workload"] == '160-200 h/mo'){
		$s1 = 160;
		$s2 = 200;
	}
	if($_POST["search-workload"] == '200-250 h/mo'){
		$s1 = 200;
		$s2 = 250;
	}
	
		for ($i = $s1; $i <= $s2; $i++) {
			$workload = R::getAll( 'SELECT * FROM post WHERE workload = :workload',
			[':workload' => $i." h/mo"]
			);
			foreach($workload as $workload){
				$workload_arr[] = $workload["id"];
			}
	  }

  $search_counter++;
  $final_arr[] = $workload_arr;
}

// ! experience
if($_POST["search-experience"] != 'experience'){


	$experience = R::getAll( 'SELECT * FROM post WHERE experience = :experience',
	[':experience' => $_POST["search-experience"]]
);

// 10-50 years = 10-50 years
if($_POST["search-experience"] == '10-50 years'){
	for ($i = 10; $i <= 50; $i++){
		$experience = R::getAll( 'SELECT * FROM post WHERE experience = :experience',
		[':experience' => $i." years"]
	);
	// ! must be here
	foreach($experience as $experience){
		$experience_arr[] = $experience["id"];
	}
	}
} 
	
	foreach($experience as $experience){
		$experience_arr[] = $experience["id"];
	}
	$search_counter++;
	$final_arr[] = $experience_arr;

}



// ! word
if($_POST["word"] != ""){

	$word = R::getAll('SELECT * FROM post WHERE title LIKE :title ',
	  array(':title' => '%'.$_POST["word"].'%' )
	);

foreach($word as $word){
	$word_arr[] = $word["id"];
}
$search_counter++;
$final_arr[] = $word_arr;
}

// ! company
if($_POST["company"] != ""){

	$company = R::getAll('SELECT * FROM post WHERE subt LIKE :subt ',
	  array(':subt' => '%'.$_POST["company"].'%' )
	);

foreach($company as $company){
	$company_arr[] = $company["id"];
}
$search_counter++;
$final_arr[] = $company_arr;
}

// ! tags
if($_POST["tags"] != ""){
	$tags = R::getAll( 'SELECT * FROM post WHERE tag_1 = :tag_1 OR tag_2 = :tag_2 OR tag_3 = :tag_3',
	[':tag_1' => $_POST["tags"],':tag_2' => $_POST["tags"],':tag_3' => $_POST["tags"]]
);

foreach($tags as $tag){
	$tags_arr[] = $tag["id"];
}
$search_counter++;
$final_arr[] = $tags_arr;
};

// ! filter
if($_POST["filter"] != 'filter'){
	if($_POST["filter"] == 'hidden'){
		$filter = R::find('hide', 'user_id = ?', [$_SESSION["user"]["id"]]);
	  }
	  if($_POST["filter"] == 'liked'){
		$filter = R::find('like', 'user_id = ?', [$_SESSION["user"]["id"]]);
	  }
	  if($_POST["filter"] == 'messaged'){
		$filter = R::find('mesd', 'user_id = ?', [$_SESSION["user"]["id"]]);
	  }
	  foreach($filter as $filter){
		  $filter_arr[] = $filter["card_id"];
		}
$search_counter++;
$final_arr[] = $filter_arr;
}
?>



<? if($search_counter == 0): ?>
	<script>location.reload();</script>
	<!-- or load all(make function) like in INDEX.PHP -->
<? endif; ?>
<?
if($search_counter == 1){
	$posts = R::loadAll('post', $final_arr[0]);
}
if($search_counter == 2){
	$intersect = array_intersect($final_arr[0], $final_arr[1]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 3){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 4){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 5){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 6){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 7){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 8){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6], $final_arr[7]);
	$posts = R::loadAll('post', $intersect);
}
if($search_counter == 9){
	$intersect = array_intersect($final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6], $final_arr[7], $final_arr[8]);
	$posts = R::loadAll('post', $intersect);
}

//  
echo "counter:".$search_counter;
?>

<pre>
 <? var_dump($_POST); ?>
 </pre>


	<? foreach($posts as $post): ?>
	
		<? if($post['id'] != "0"): ?>
		
		<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">
			<? 
				include "card-content.php";
			?>
		</div>
		
		<? endif; ?>
		
	<? endforeach; ?> 






<!-- ! liked -->
<? if($_POST["filter"] == 'liked'): ?>
	<script>
	$('.like').attr('src', 'img/icons/liked.svg');
	</script>
	<? endif; ?>

<!-- ! hidden -->
<? if($_POST["filter"] == 'hidden'): ?>
	<script>
	$('.card').addClass('db-hidden');
	</script>
	<? endif; ?>

<!-- ! messaged -->
	<? if($_POST["filter"] == 'messaged'): ?>
	<script>
	$('.get-mes-form').addClass('yet-applied').addClass('op03');
	</script>
	<? endif; ?>

<!-- ! tags -->
<? if($_POST["tags"] != ""): ?>
<script>
$('.card').find(`.tag:contains("<? echo $_POST["tags"] ?>")`).addClass('tag_active');
</script>
<? endif; ?>
