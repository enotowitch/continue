<?  
// clean cache
ob_end_clean(); 

header('Content-Type: application/json');
require_once "DB.php";

if($_POST["card_from"] == "/index.php"){
	$titles = R::getCol('SELECT title FROM post');
}
if($_POST["card_from"] == "/portfolios.php"){
	$titles = R::getCol('SELECT title FROM portfolio');
}


for($i=0;$i<=count($titles)-1;$i++){
	$result["text$i"] = "$titles[$i]";
}

 
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit();
?>