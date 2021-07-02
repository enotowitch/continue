<?  
session_start();
// clean cache
ob_end_clean(); 

header('Content-Type: application/json');
require_once "DB.php";

// ! find
if($_POST["card_from"] == "/index.php"){
	$company = R::getCol('SELECT subt FROM post');
}
if($_POST["card_from"] == "/portfolios.php"){
	$company = R::getCol('SELECT subt FROM portfolio');
}
if($_POST["card_from"] == "/post-job.php"){
	$company = R::getAll( 'SELECT subt FROM post WHERE user_id = :user_id',
	[':user_id' => $_SESSION["user"]["id"]]
	);	
}
if($_POST["card_from"] == "/post-portfolio.php"){
	$company = R::getAll( 'SELECT subt FROM portfolio WHERE user_id = :user_id',
	[':user_id' => $_SESSION["user"]["id"]]
	);	
}

// ! prepare
if($_POST["card_from"] == "/index.php" || $_POST["card_from"] == "/portfolios.php"){
	for($i=0;$i<=count($company)-1;$i++){
		$result["text$i"] = "$company[$i]";
	}
}
if($_POST["card_from"] == "/post-job.php" || $_POST["card_from"] == "/post-portfolio.php"){
	for($i=0;$i<=count($company)-1;$i++){
		$result["text$i"] = $company[$i]["subt"];
	}
}


 
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit();
?>