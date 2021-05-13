<? 
require_once "DB.php";
session_start();

$hide = R::find('hide', 'user_id = ?', [$_SESSION['user']['id']]);

$hidden = array();

foreach($hide as $hide){
	$hidden[] = $hide["card_id"];
}

echo json_encode($hidden);

?>
