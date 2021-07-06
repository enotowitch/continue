<? 
 session_start();
 require_once "DB.php";
 include_once "functions.php";

// ! search destination
if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
	$destination = 'post';
} 
if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
	$destination = 'portfolio';
}


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
$posted_arr = array();

// !!! add to each search!
$search_counter = 0;

// ! all posts
if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/portfolios.php"){

	$search_in_posts = R::find($destination);

	foreach($search_in_posts as $search_in_posts){
		$search_in_posts_arr[] = $search_in_posts["id"];
	}
} 
// ! my posts
if($_POST['card_from'] == "/post-job.php" || $_POST['card_from'] == "/post-portfolio.php"){

	if($_POST['card_from'] == "/post-job.php"){
		$search_in_posts = R::getAll( 'SELECT * FROM post WHERE user_id = :user_id',
		[':user_id' => $_SESSION["user"]["id"]]
		);
	}
	if($_POST['card_from'] == "/post-portfolio.php"){
		$search_in_posts = R::getAll( 'SELECT * FROM portfolio WHERE user_id = :user_id',
		[':user_id' => $_SESSION["user"]["id"]]
		);
	}


	foreach($search_in_posts as $search_in_posts){
		$search_in_posts_arr[] = $search_in_posts["id"];
	}
}




// ! location
if($_POST["search-location"] != 'location'){
	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$location = R::getAll( 'SELECT * FROM post WHERE location = :location',
		[':location' => $_POST["search-location"]]
	);
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$location = R::getAll( 'SELECT * FROM portfolio WHERE location = :location',
		[':location' => $_POST["search-location"]]
	);
	}


foreach($location as $location){
	$location_arr[] = $location["id"];
}
$search_counter++;
$final_arr[] = $location_arr;
}
// ! render
?>
<? if($_POST["search-location"] != 'location'): ?>
	<script>
	$('.search-result').find('.cancel_filter_location').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_location"><span class="gray">Location:&nbsp</span><div><? echo $_POST["search-location"]; ?></div><span class="close-cancel-filter close_cancel_filter_location"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render

// ! duration
if($_POST["search-duration"] != 'duration'){
	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$duration = R::getAll( 'SELECT * FROM post WHERE duration = :duration',
		[':duration' => $_POST["search-duration"]]
	);
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$duration = R::getAll( 'SELECT * FROM portfolio WHERE duration = :duration',
		[':duration' => $_POST["search-duration"]]
	);
	}


foreach($duration as $duration){
	$duration_arr[] = $duration["id"];
}
$search_counter++;
$final_arr[] = $duration_arr;
}
// ! render
?>
<? if($_POST["search-duration"] != 'duration'): ?>
	<script>
	$('.search-result').find('.cancel_filter_duration').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_duration"><span class="gray">duration:&nbsp</span><div><? echo $_POST["search-duration"]; ?></div><span class="close-cancel-filter close_cancel_filter_duration"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render


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
			if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
				$salary = R::getAll( 'SELECT * FROM post WHERE salary = :salary',
				[':salary' => "$$i/h"]
				);
			}
			if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
				$salary = R::getAll( 'SELECT * FROM portfolio WHERE salary = :salary',
				[':salary' => "$$i/h"]
				);
			}

			foreach($salary as $salary){
				$salary_arr[] = $salary["id"];
			}
	  }

  $search_counter++;
  $final_arr[] = $salary_arr;
}
// ! render
?>
<? if($_POST["search-salary"] != 'salary'): ?>
	<script>
	$('.search-result').find('.cancel_filter_salary').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_salary"><span class="gray">salary:&nbsp</span><div><? echo $_POST["search-salary"]; ?></div><span class="close-cancel-filter close_cancel_filter_salary"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render

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
			if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
				$workload = R::getAll( 'SELECT * FROM post WHERE workload = :workload',
				[':workload' => $i." h/mo"]
				);
			}
			if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
				$workload = R::getAll( 'SELECT * FROM portfolio WHERE workload = :workload',
				[':workload' => $i." h/mo"]
				);
			}

			foreach($workload as $workload){
				$workload_arr[] = $workload["id"];
			}
	  }

  $search_counter++;
  $final_arr[] = $workload_arr;
}
// ! render
?>
<? if($_POST["search-workload"] != 'workload'): ?>
	<script>
	$('.search-result').find('.cancel_filter_workload').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_workload"><span class="gray">workload:&nbsp</span><div><? echo $_POST["search-workload"]; ?></div><span class="close-cancel-filter close_cancel_filter_workload"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render

// ! experience
if($_POST["search-experience"] != 'experience'){

	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$experience = R::getAll( 'SELECT * FROM post WHERE experience = :experience',
		[':experience' => $_POST["search-experience"]]
	);
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$experience = R::getAll( 'SELECT * FROM portfolio WHERE experience = :experience',
		[':experience' => $_POST["search-experience"]]
	);
	}


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
// ! render
?>
<? if($_POST["search-experience"] != 'experience'): ?>
	<script>
	$('.search-result').find('.cancel_filter_experience').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_experience"><span class="gray">experience:&nbsp</span><div><? echo $_POST["search-experience"]; ?></div><span class="close-cancel-filter close_cancel_filter_experience"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render



// ! word
if($_POST["search-word"] != ""){

	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$word = R::getAll('SELECT * FROM post WHERE title LIKE :title ',
		array(':title' => '%'.$_POST["search-word"].'%' )
	 );
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$word = R::getAll('SELECT * FROM portfolio WHERE title LIKE :title ',
		array(':title' => '%'.$_POST["search-word"].'%' )
	 );
	}


foreach($word as $word){
	$word_arr[] = $word["id"];
}
$search_counter++;
$final_arr[] = $word_arr;
}
// ! render
?>
<? if($_POST["search-word"] != ''): ?>
	<script>
	$('.search-result').find('.cancel_filter_word').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_word"><span class="gray">Title:&nbsp</span><div><? echo $_POST["search-word"]; ?></div><span class="close-cancel-filter close_cancel_filter_word"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render



// ! company
if($_POST["search-company"] != ""){

	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$company = R::getAll('SELECT * FROM post WHERE subt LIKE :subt ',
		array(':subt' => '%'.$_POST["search-company"].'%' )
	 );
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$company = R::getAll('SELECT * FROM portfolio WHERE subt LIKE :subt ',
		array(':subt' => '%'.$_POST["search-company"].'%' )
	 );
	}


foreach($company as $company){
	$company_arr[] = $company["id"];
}
$search_counter++;
$final_arr[] = $company_arr;
}
// ! render
?>
<? if($_POST["search-company"] != ''): ?>
	<script>
	$('.search-result').find('.cancel_filter_company').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_company"><span class="gray">Сompany:&nbsp</span><div><? echo $_POST["search-company"]; ?></div><span class="close-cancel-filter close_cancel_filter_company"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render




// ! tags
if($_POST["tags"] != ""){

	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$tags = R::getAll( 'SELECT * FROM post WHERE tag_1 = :tag_1 OR tag_2 = :tag_2 OR tag_3 = :tag_3',
		[':tag_1' => $_POST["tags"],':tag_2' => $_POST["tags"],':tag_3' => $_POST["tags"]]
	);
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$tags = R::getAll( 'SELECT * FROM portfolio WHERE tag_1 = :tag_1 OR tag_2 = :tag_2 OR tag_3 = :tag_3',
		[':tag_1' => $_POST["tags"],':tag_2' => $_POST["tags"],':tag_3' => $_POST["tags"]]
	);
	}


foreach($tags as $tag){
	$tags_arr[] = $tag["id"];
}
$search_counter++;
$final_arr[] = $tags_arr;
};
// ! render
?>
<? if($_POST["tags"] != ''): ?>
	<script>
	// ! render 1
	$('.tag').removeClass('tag_active');
	$(`.tag:contains("<? echo $_POST["tags"]; ?>")`).each(function(){
		if($(this).text().trim() == "<? echo $_POST["tags"]; ?>"){
			$(this).addClass('tag_active');
		}		
	});
	// ! render 2
	$('.search-result').find('.cancel_filter_tag').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_tag"><? echo $_POST["tags"]; ?><span class="close-cancel-filter close_cancel_filter_tag"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render

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
// ! render
?>
<? if($_POST["filter"] != 'filter'): ?>
	<script>
	$('.search-result').find('.cancel_filter_filter').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_filter"><? echo $_POST["filter"]; ?><span class="close-cancel-filter close_filter"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render



// ! posted
if($_POST["search-posted"] != 'posted'){

	$now = time();

	if($_POST["search-posted"] == 'today'){
		// 1 day;
		$days = $now - (60*60*24);
	}
	if($_POST["search-posted"] == 'today - 3 days ago'){
		// 3 days + 1;
		$days = $now - (60*60*24*4);
	}
	if($_POST["search-posted"] == 'today - 7 days ago'){
		// 7 days + 1;
		$days = $now - (60*60*24*8);
	}
	if($_POST["search-posted"] == 'today - 14 days ago'){
		// 14 days + 1;
		$days = $now - (60*60*24*15);
	}

	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
		$posted = R::getAll( 'SELECT * FROM post WHERE time > :days',
		[':days' => $days]
		);
	}
	if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$posted = R::getAll( 'SELECT * FROM portfolio WHERE time > :days',
		[':days' => $days]
		);
	}


foreach($posted as $posted){
	$posted_arr[] = $posted["id"];
}
$search_counter++;
$final_arr[] = $posted_arr;
}
// ! render
?>
<? if($_POST["search-posted"] != 'posted'): ?>
	<script>
	$('.search-result').find('.cancel_filter_posted').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_posted"><span class="gray">posted:&nbsp</span><div><? echo $_POST["search-posted"]; ?></div><span class="close-cancel-filter close_cancel_filter_posted"></span></div>`);
	</script>
<? endif; ?>




<? if($search_counter == 0){
	if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/portfolios.php"){
		$posts = load_all_posts($destination); 
	}
	if($_POST['card_from'] == "/post-job.php" || $_POST['card_from'] == "/post-portfolio.php"){
		$posts = load_my_posts($destination); 
	}
} ?>
<?
if($search_counter == 1){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 2){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 3){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 4){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 5){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 6){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 7){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 8){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6], $final_arr[7]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 9){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6], $final_arr[7], $final_arr[8]);
	$posts = R::loadAll($destination, $intersect);
}
if($search_counter == 10){
	$intersect = array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6], $final_arr[7], $final_arr[8], $final_arr[9]);
	$posts = R::loadAll($destination, $intersect);
}

echo "counter:".$search_counter;
?>

<? if($search_counter == 1): ?>
<script>
$('.search-result').append(`<div class="cancel-filter cancel_all_filters">Cancel Results: <? echo count($final_arr[0]); ?></div>`);
</script>
<? endif; ?>
<? if($search_counter > 1): ?>
<script>
$('.search-result').append(`<div class="cancel-filter cancel_all_filters">Cancel Results: <? echo count($intersect); ?></div>`);
</script>
<? endif; ?>


	<!-- ! search-result -->
	<div class="search-result"></div>
	<!-- ? search-result -->



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
<? 
$filter = R::find('like', 'user_id = ?', [$_SESSION["user"]["id"]]);
?>
<? foreach($filter as $filter): ?>
	<script>
	$('.card').each(function(){
		var card_id = $(this).find('.card_id').val();
		var db_id = '<? echo $filter['card_id']; ?>';
		if(db_id == card_id){
			$(this).find('.like').attr('src', 'img/icons/liked.svg');
		}
	})
	</script>
<? endforeach; ?> 
<!-- ? liked -->



<!-- ! hidden -->
<? 
$filter = R::find('hide', 'user_id = ?', [$_SESSION["user"]["id"]]);
?>
<? foreach($filter as $filter): ?>
	<script>
	$('.card').each(function(){
		var card_id = $(this).find('.card_id').val();
		var db_id = '<? echo $filter['card_id']; ?>';
		if(db_id == card_id){
			$(this).addClass('db-hidden');
		}
	})
	$('.db-hidden').addClass('op05');
	$('.db-hidden').find('.hide').css({'border-bottom':'2px solid tomato', 'padding-bottom':'2px'});
	</script>
<? endforeach; ?> 
<? if($_POST["filter"] == 'hidden'): ?>
	<script>
		$('.db-hidden').removeClass('op05');
	</script>
<? endif; ?>
<!-- ? hidden -->




<!-- ! messaged -->
<? 
$filter = R::find('mesd', 'user_id = ?', [$_SESSION["user"]["id"]]);
?>
<? foreach($filter as $filter): ?>
	<script>
	$('.card').each(function(){
		var card_id = $(this).find('.card_id').val();
		var db_id = '<? echo $filter['card_id']; ?>';
		if(db_id == card_id){
			$(this).find('.get-mes-form').addClass('yet-applied').addClass('op05').css({'border-bottom':'2px solid #6fda44', 'padding-bottom':'2px'});;
		}
	})
	</script>
<? endforeach; ?> 
<!-- ? messaged -->




