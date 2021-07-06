<? 
require_once "DB.php";
session_start();

$like = R::find('liked', 'user_id = ?', [$_SESSION['user']['id']]);

$likes = array();

foreach($like as $like){
	$likes[] = $like["card_id"];
}

echo json_encode($likes);

?>
