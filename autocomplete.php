<?  
session_start();
// clean cache
ob_end_clean(); 

header('Content-Type: application/json');
require_once "DB.php";

// ! find
if($_POST["card_from"] == "/index.php"){
	$titles = R::getAll( 'SELECT title,subt FROM post WHERE cat = :cat',
	[':cat' => 'job']
	);
}
if($_POST["card_from"] == "/portfolios.php"){
	$titles = R::getAll( 'SELECT title,subt FROM post WHERE cat = :cat',
	[':cat' => 'folio']
	);	
}
if($_POST["card_from"] == "/post-job.php"){
	$titles = R::getAll( 'SELECT title,subt FROM post WHERE user_id = :user_id AND cat = :cat',
	[':user_id' => $_SESSION["user"]["id"], ':cat' => 'job']
	);	
}
if($_POST["card_from"] == "/post-portfolio.php"){
	$titles = R::getAll( 'SELECT title,subt FROM post WHERE user_id = :user_id AND cat = :cat',
	[':user_id' => $_SESSION["user"]["id"], ':cat' => 'folio']
	);	
}
if($_POST["card_from"] == "/messages.php" || $_POST["card_from"] == "/messages-folios.php"){

	$_POST["card_from"] == "/messages.php" ? $cat = 'folio' : $cat = 'job';

	// 1. find post ids(apply_id) which applied to you
	$find_post_id = R::getAll( 'SELECT apply_id FROM message WHERE user_to_id = :user_to_id AND applied_to_cat = :cat',
	[':user_to_id' => $_SESSION["user"]["id"], ':cat' => $cat]
	);
	for($i=0;$i<=count($find_post_id)-1;$i++){
		$load_posts[] = $find_post_id[$i]["apply_id"];
	}
	// 2. load that posts
	$load_titles = R::loadAll('post', $load_posts);
	// 3. stack titles & subts to 'prepare'
	$n = 0;
	foreach($load_titles as $load_title){
		$titles[$n]["title"] = $load_title["title"];
		$titles[$n]["subt"] = $load_title["subt"];
		$n++;
	}
}
// ! prepare
	for($i=0;$i<=count($titles)-1;$i++){
		$result["title"]["text$i"] = $titles[$i]["title"];
		$result["subt"]["text$i"] = $titles[$i]["subt"];
	}

	$result["title"] = array_unique($result["title"]);
	$result["subt"] = array_unique($result["subt"]);


 
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit();
?>