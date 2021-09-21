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



$load_all = array();
foreach($posts as $post){
	$load_all[] = $post["id"];
}


$load_10 = array();
for ($i=$_POST["quantity"]; $i<=$_POST["quantity"]+9; $i++) { 
	$load_10[] = $load_all[$i];
}

$posts = R::loadAll('post', $load_10);

render_cards_json($posts);
?>
