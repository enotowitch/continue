<?  
// clean cache
ob_end_clean(); 

header('Content-Type: application/json');
require_once "DB.php";


$company = R::getCol('SELECT subt FROM post');


for($i=0;$i<=count($company)-1;$i++){
	$result["text$i"] = "$company[$i]";
}

 
echo json_encode($result, JSON_UNESCAPED_UNICODE);

exit();
?>