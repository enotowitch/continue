<? 
session_start();
require_once "DB.php";
require_once "functions.php";


if($_POST["card_from"] == "/index.php" || $_POST["card_from"] == "/portfolios.php"){
	$posts = load_all_posts($_POST["cat"]);
}
if($_POST["card_from"] == "/post-job.php" || $_POST["card_from"] == "/post-portfolio.php"){
	$posts = load_my_posts($_POST["cat"]);
}
if($_POST["card_from"] == "/messages.php"){
	$posts = load_all_applications('folio');
}




$posts = load_10($posts, $_POST["last_card_id"]);




render_cards_json($posts);
?>
