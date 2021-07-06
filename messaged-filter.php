<? 
require_once "DB.php";
session_start();

$mesd = R::find('messaged', 'user_id = ?', [$_SESSION['user']['id']]);

$mesd_filter_arr = array();

foreach($mesd as $mesd){
	$mesd_filter_arr[] = $mesd["card_id"];
}

echo json_encode($mesd_filter_arr);

?>
