<?  
session_start();
// clean cache
ob_end_clean(); 

header('Content-Type: application/json');
require_once "DB.php";

// ! find
if($_POST["card_from"] == "/index.php"){
	$titles = R::getCol('SELECT title FROM post');
}
if($_POST["card_from"] == "/portfolios.php"){
	$titles = R::getCol('SELECT title FROM portfolio');
}
if($_POST["card_from"] == "/post-job.php"){
	$titles = R::getAll( 'SELECT title FROM post WHERE user_id = :user_id',
	[':user_id' => $_SESSION["user"]["id"]]
	);	
}
if($_POST["card_from"] == "/post-portfolio.php"){
	$titles = R::getAll( 'SELECT title FROM portfolio WHERE user_id = :user_id',
	[':user_id' => $_SESSION["user"]["id"]]
	);	
}
// ! prepare
if($_POST["card_from"] == "/index.php" || $_POST["card_from"] == "/portfolios.php"){
	for($i=0;$i<=count($titles)-1;$i++){
		$result["text$i"] = "$titles[$i]";
	}
}
if($_POST["card_from"] == "/post-job.php" || $_POST["card_from"] == "/post-portfolio.php"){
	for($i=0;$i<=count($titles)-1;$i++){
		$result["text$i"] = $titles[$i]["title"];
	}
}


 
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit();
?>