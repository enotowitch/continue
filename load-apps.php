<? 
session_start();
require_once "DB.php";
require_once "functions.php";

$applications = R::find('message', 'applied_to_card = ?', [$_POST["post_id"]]);
$posts_from_apps = array();
foreach($applications as $application){
	$posts_from_apps[] = $application["apply_id"];
}
$posts_from_apps = throw_hidden_and_applied($posts_from_apps);

$posts = R::loadAll('post', $posts_from_apps);

render_cards_json($posts);
?>