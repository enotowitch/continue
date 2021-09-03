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