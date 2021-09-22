<? 
 session_start();
 require_once "DB.php";
 include_once "functions.php";

// ! search cat
if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/post-job.php"){
	$cat = 'job';
} 
if($_POST['card_from'] == "/portfolios.php" || $_POST['card_from'] == "/post-portfolio.php"){
	$cat = 'folio';
}
if($_POST['card_from'] == "/messages.php"){
	$cat = 'job';
}
if($_POST['card_from'] == "/messages-folios.php"){
	$cat = 'folio';
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
$application_arr = array();

// !!! add to each search!
$search_counter = 0;

// ! search in: all posts
if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/portfolios.php"){

	$search_in_posts = R::find('post');

	foreach($search_in_posts as $search_in_posts){
		$search_in_posts_arr[] = $search_in_posts["id"];
	}
	// if search does not include hidden or applied don't show that
	if($_POST["filter"] != 'hidden' && $_POST["show-hidden-posts"] == NULL){
		$hidden_arr = hidden_posts();
		$search_in_posts_arr = array_diff($search_in_posts_arr, $hidden_arr);
	}
	if($_POST["filter"] != 'applied' && $_POST["show-applied-posts"] == NULL){
		$applied_arr = applied_posts();
		$search_in_posts_arr = array_diff($search_in_posts_arr, $applied_arr);
	}
} 
// ! search in: my posts
if($_POST['card_from'] == "/post-job.php" || $_POST['card_from'] == "/post-portfolio.php"){

	
		$search_in_posts = R::getAll( 'SELECT * FROM post WHERE user_id = :user_id AND cat = :cat',
		[':user_id' => $_SESSION["user"]["id"], ':cat' => $cat]
		);


	foreach($search_in_posts as $search_in_posts){
		$search_in_posts_arr[] = $search_in_posts["id"];
	}
}
// ! search in: applications
if($_POST['card_from'] == "/messages.php" || $_POST['card_from'] == "/messages-folios.php"){
	
	$search_in_posts = R::getAll( 'SELECT * FROM message WHERE user_to_id = :user_to_id',
	[':user_to_id' => $_SESSION["user"]["id"]]
	);


foreach($search_in_posts as $search_in_posts){
	if($search_in_posts["apply_id"] != NULL){
		$search_in_posts_arr[] = $search_in_posts["apply_id"];
	}
}

$search_in_posts_arr = array_unique($search_in_posts_arr);

	// if search does not include hidden or applied don't show that
	if($_POST["filter"] != 'hidden' && $_POST["show-hidden-posts"] == NULL){
		$hidden_arr = hidden_posts();
		$search_in_posts_arr = array_diff($search_in_posts_arr, $hidden_arr);
	}
	if($_POST["filter"] != 'applied' && $_POST["show-applied-posts"] == NULL){
		$applied_arr = applied_posts();
		$search_in_posts_arr = array_diff($search_in_posts_arr, $applied_arr);
	}
}


// ! application =0 (avail only on messages.php & messages-folios.php)
if($_POST["application"] != ""){
	$posts_to_app = R::findAll('message', 'applied_to_card = ?', [$_POST["application"]]);

	foreach($posts_to_app as $posts_to_app){
		$application_arr[] = $posts_to_app["apply_id"];
	}
	$search_counter++;
	$final_arr[] = $application_arr;
}

// ! tags =1 (=1 - order)
if($_POST["tags"] != ""){

	
	$tags = R::getAll( 'SELECT * FROM post WHERE cat = :cat AND tag_1 = :tag_1 OR cat = :cat AND tag_2 = :tag_2 OR cat = :cat AND tag_3 = :tag_3',
	[':tag_1' => $_POST["tags"],':tag_2' => $_POST["tags"],':tag_3' => $_POST["tags"], ':cat' => $cat]
);


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



// ! filter =2
if($_POST["filter"] != NULL){

	$filter = R::find($_POST["filter"], 'user_id = ? AND cat = ?', [$_SESSION["user"]["id"], $cat]);

	  foreach($filter as $filter){
		  $filter_arr[] = $filter["card_id"];
		}
$search_counter++;
$final_arr[] = $filter_arr;
}
// ! render
?>
<? if($_POST["filter"] != NULL): ?>
	<script>
	$('.search-result').find('.cancel_filter_filter').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_filter"><? echo $_POST["filter"]; ?><span class="close-cancel-filter close_filter"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render


// ! word =3
if($_POST["search-word"] != ""){

	
	$word = R::getAll('SELECT * FROM post WHERE title LIKE :title AND cat = :cat',
	array(':title' => '%'.$_POST["search-word"].'%', ':cat' => $cat )
 );


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
$('.search-result').append(`<div class="cancel-filter cancel_filter_word"><span class="gray">title:&nbsp</span><div><? echo $_POST["search-word"]; ?></div><span class="close-cancel-filter close_cancel_filter_word"></span></div>`);
</script>
<? endif; ?>
<?
// ? render


// ! company =4
if($_POST["search-company"] != ""){

	
	$company = R::getAll('SELECT * FROM post WHERE subt LIKE :subt AND cat = :cat',
	array(':subt' => '%'.$_POST["search-company"].'%', ':cat' => $cat)
 );


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
$('.search-result').append(`<div class="cancel-filter cancel_filter_company"><span class="gray">company:&nbsp</span><div><? echo $_POST["search-company"]; ?></div><span class="close-cancel-filter close_cancel_filter_company"></span></div>`);
</script>
<? endif; ?>
<?
// ? render


// ! salary =5
if($_POST["search-salary"] != NULL){


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
			
				$salary = R::getAll( 'SELECT * FROM post WHERE salary = :salary AND cat = :cat',
				[':salary' => "$$i/h", ':cat' => $cat]
				);


			if($_POST["search-salary"] == 'volunteer'){		
				$salary = R::getAll( 'SELECT * FROM post WHERE salary = :salary AND cat = :cat',
				[':salary' => "volunteer", ':cat' => $cat]
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
<? if($_POST["search-salary"] != NULL): ?>
	<script>
	$('.search-result').find('.cancel_filter_salary').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_salary"><span class="gray">salary:&nbsp</span><div><? echo $_POST["search-salary"]; ?></div><span class="close-cancel-filter close_cancel_filter_salary"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render



// ! experience =6
if($_POST["search-experience"] != NULL){

	
	$experience = R::getAll( 'SELECT * FROM post WHERE experience = :experience AND cat = :cat',
	[':experience' => $_POST["search-experience"], ':cat' => $cat]
);


// todo
// 10-50 years = 10-50 years
if($_POST["search-experience"] == '10-50 years'){
for ($i = 10; $i <= 50; $i++){
	$experience = R::getAll( 'SELECT * FROM post WHERE experience = :experience AND cat = :cat',
	[':experience' => $i." years", ':cat' => $cat]
);
// ! must be here
foreach($experience as $experience){
	$experience_arr[] = $experience["id"];
}
}
} 
if($_POST["search-experience"] != '10-50 years'){
	foreach($experience as $experience){
		$experience_arr[] = $experience["id"];
	}
}
$search_counter++;
$final_arr[] = $experience_arr;

}
// ! render
?>
<? if($_POST["search-experience"] != NULL): ?>
<script>
$('.search-result').find('.cancel_filter_experience').detach();
$('.search-result').append(`<div class="cancel-filter cancel_filter_experience"><span class="gray">experience:&nbsp</span><div><? echo $_POST["search-experience"]; ?></div><span class="close-cancel-filter close_cancel_filter_experience"></span></div>`);
</script>
<? endif; ?>
<?
// ? render


// ! location =7
if($_POST["search-location"] != NULL){
	
		$location = R::getAll( 'SELECT * FROM post WHERE location = :location AND cat = :cat',
		[':location' => $_POST["search-location"], ':cat' => $cat]
	);


foreach($location as $location){
	$location_arr[] = $location["id"];
}
$search_counter++;
$final_arr[] = $location_arr;
}
// ! render
?>
<? if($_POST["search-location"] != NULL): ?>
	<script>
	$('.search-result').find('.cancel_filter_location').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_location"><span class="gray">location:&nbsp</span><div><? echo $_POST["search-location"]; ?></div><span class="close-cancel-filter close_cancel_filter_location"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render

// ! duration =8
if($_POST["search-duration"] != NULL){
	
	$duration = R::getAll( 'SELECT * FROM post WHERE duration = :duration AND cat = :cat',
	[':duration' => $_POST["search-duration"], ':cat' => $cat]
);


foreach($duration as $duration){
	$duration_arr[] = $duration["id"];
}
$search_counter++;
$final_arr[] = $duration_arr;
}
// ! render
?>
<? if($_POST["search-duration"] != NULL): ?>
	<script>
	$('.search-result').find('.cancel_filter_duration').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_duration"><span class="gray">type:&nbsp</span><div><? echo $_POST["search-duration"]; ?></div><span class="close-cancel-filter close_cancel_filter_duration"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render




// ! workload =9
if($_POST["search-workload"] != NULL){
	
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
			
				$workload = R::getAll( 'SELECT * FROM post WHERE workload = :workload AND cat = :cat',
				[':workload' => $i." h/mo", ':cat' => $cat]
				);

			foreach($workload as $workload){
				$workload_arr[] = $workload["id"];
			}
	  }

  $search_counter++;
  $final_arr[] = $workload_arr;
}
// ! render
?>
<? if($_POST["search-workload"] != NULL): ?>
	<script>
	$('.search-result').find('.cancel_filter_workload').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_workload"><span class="gray">workload:&nbsp</span><div><? echo $_POST["search-workload"]; ?></div><span class="close-cancel-filter close_cancel_filter_workload"></span></div>`);
	</script>
<? endif; ?>
<?
// ? render



// ! posted =10
if($_POST["search-posted"] != NULL){

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

	
		$posted = R::getAll( 'SELECT * FROM post WHERE time > :days AND cat = :cat',
		[':days' => $days, ':cat' => $cat]
		);


foreach($posted as $posted){
	$posted_arr[] = $posted["id"];
}
$search_counter++;
$final_arr[] = $posted_arr;
}
// ! render
?>
<? if($_POST["search-posted"] != NULL): ?>
	<script>
	$('.search-result').find('.cancel_filter_posted').detach();
	$('.search-result').append(`<div class="cancel-filter cancel_filter_posted"><span class="gray">posted:&nbsp</span><div><? echo $_POST["search-posted"]; ?></div><span class="close-cancel-filter close_cancel_filter_posted"></span></div>`);
	</script>
<? endif; ?>





<?
// prevent errors: prepare arrays for intersect: if no search-array -> dublicate 0(first) search-array: it's ok
if(!isset($final_arr[0])){
	$final_arr[0] = array();
}
for($i=1;$i<=9;$i++){
	if(!isset($final_arr[$i])){
		$final_arr[$i] = $final_arr[0];
	}
}
	// ! prepare posts (12)
	$intersect = array_values(array_intersect($search_in_posts_arr, $final_arr[0], $final_arr[1], $final_arr[2], $final_arr[3], $final_arr[4], $final_arr[5], $final_arr[6], $final_arr[7], $final_arr[8], $final_arr[9]));
	$intersect_10 = array();
	if(!isset($_POST["quantity"])){
		for($i=0;$i<=11;$i++){
			$intersect_10[] = $intersect[$i];
		}
	} else {
		for($i=$_POST["quantity"];$i<=$_POST["quantity"]+11;$i++){
			$intersect_10[] = $intersect[$i];
		}
	}

	$posts = R::loadAll('post', $intersect_10);

// echo "counter:".$search_counter;
?>

<? if(count($intersect) == 0 && $search_counter != 0): ?>
<script>
$('.card-flex').addClass('dont-load-more');
$('.card-flex').append(`<div class="oops">OOPS! NOTHING FOUND!</div>`);
$('.tag').removeClass('empty-tag');
$('.tag_active').addClass('empty-tag');
</script>
<? endif; ?>
<? if($search_counter > 0): ?>
<script>
// ! SEARCH_COUNTER > 0
// prevent load-more posts in search
$('.card-flex').addClass('dont-load-more');
$('.search-result').append(`<div class="cancel-filter cancel_all_filters">cancel results: <? echo count($intersect); ?></div>`);
// ! render search-result number
// small card size
<? if($_COOKIE['size'] != "w100"): ?>
$('.search-result').after('<div class="load-search"><div class="load-less-search">prev</div><div class="search-results-num">results: <? echo $_POST["quantity"]; ?>-<? echo $_POST["quantity"]+11; ?><span class="go-to-first">go to first</span></div><div class="load-more-search">next</div></div>');
<? endif; ?>
// prevent load-less
<? if($_POST["quantity"] == 0): ?>
	$(document).find('.load-less-search').removeClass('load-less-search').addClass('load-less-search-fake');
<? endif; ?>
// big card size
<? if($_COOKIE['size'] == "w100"): ?>
	$('.card-flex').append('<div class="load-search"><div class="load-less-search">prev</div><div class="search-results-num">results: <? echo $_POST["quantity"]; ?>-<? echo $_POST["quantity"]+11; ?><span class="go-to-first">go to first</span></div><div class="load-more-search">next</div></div>');
<? endif; ?>
// ? render search-result number
// show-hidden-posts & show-applied-posts
<? if($_POST["show-hidden-posts"] == NULL && $_POST["card_from"] != "/post-job.php" && $_POST["card_from"] != "/post-portfolio.php"): ?>
$('.search-result').append('<div class="show-hidden-posts" >Show hidden posts</div>');
<? endif; ?>
<? if($_POST["show-hidden-posts"] != NULL && $_POST["card_from"] != "/post-job.php" && $_POST["card_from"] != "/post-portfolio.php"): ?>
$('.search-result').append('<div class="dont-show-hidden-posts" >Don\'t show hidden</div>');
<? endif; ?>
<? if($_POST["show-applied-posts"] == NULL && $_POST["card_from"] != "/post-job.php" && $_POST["card_from"] != "/post-portfolio.php"): ?>
$('.search-result').append('<div class="show-applied-posts" >Show applied posts</div>');
<? endif; ?>
<? if($_POST["show-applied-posts"] != NULL && $_POST["card_from"] != "/post-job.php" && $_POST["card_from"] != "/post-portfolio.php"): ?>
$('.search-result').append('<div class="dont-show-applied-posts" >Don\'t show applied</div>');
<? endif; ?>
// ? SEARCH_COUNTER > 0
</script>
<? endif; ?>
<? if(count($intersect) == 0): ?>
	<script>
		// SEARCH_COUNTER = filters; count($intersect) = RESULTS
		// ! 0 RESULTS
		$('.load-search').detach();
		$('.card-flex').append('<div class="try"><div class="try__title">Try:</div><div class="show-hidden-posts">Show hidden posts</div><div class="show-applied-posts">Show applied posts</div><div class="try-tag">Search only tag</div></div>');
		// ? 0 RESULTS
	</script>
<? endif; ?>
<!-- ! $SEARCH_COUNTER == 0 -->
<? if($search_counter == 0): ?>
	<!-- allow load-more when no search -->
	<script>
	$('.card-flex').removeClass('dont-load-more');
	$('.card-flex').removeClass('stop-load-more');
	
	$('.try').detach();
	</script>
	<? if($_POST['card_from'] == "/index.php" || $_POST['card_from'] == "/portfolios.php"): ?>
		<? $posts = load_all_num_posts($cat); ?>
	<? endif; ?>
	<? if($_POST['card_from'] == "/post-job.php" || $_POST['card_from'] == "/post-portfolio.php"): ?>
		<? $posts = load_my_num_posts($cat); ?>
	<? endif; ?>
	<? if($_POST['card_from'] == "/messages.php" || $_POST['card_from'] == "/messages-folios.php"): ?>
		<? 
		if($_POST['card_from'] == "/messages.php"){
			$cat = 'folio';
		}
		if($_POST['card_from'] == "/messages-folios.php"){
			$cat = 'job';
		}
		$posts = load_num_applications($cat); 
		$posts = $posts[0];
		?>
		<div class="show-hid-app">
			<div class="show-hidden-posts">Show hidden posts</div>
			<div class="show-applied-posts">Show applied posts</div>
		</div>
	<? endif; ?>
<? endif; ?>
<!-- ? $SEARCH_COUNTER == 0 -->

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

