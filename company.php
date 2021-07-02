<?  
// clean cache
ob_end_clean(); 

header('Content-Type: application/json');
require_once "DB.php";

if($_POST["card_from"] == "/index.php"){
	$company = R::getCol('SELECT subt FROM post');
}
if($_POST["card_from"] == "/portfolios.php"){
	$company = R::getCol('SELECT subt FROM portfolio');
}


for($i=0;$i<=count($company)-1;$i++){
	$result["text$i"] = "$company[$i]";
}

 
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit();
?>