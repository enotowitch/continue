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



$load_all = array();
foreach($posts as $post){
	$load_all[] = $post["id"];
}


$load_10 = array();
for ($i=$_POST["quantity"]; $i<=$_POST["quantity"]+9; $i++) { 
	$load_10[] = $load_all[$i];
}

$posts = R::loadAll('post', $load_10);
?>

<? foreach($posts as $post): ?>
	<? if($post['id'] != 0): ?>
	<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">
		<? 
			include "card-content.php";
		?>
	</div>
	<? endif; ?>
<? endforeach; ?>
