<? 
require_once "DB.php";


if($_POST["card_from"] == '/post-job.php'){
	$update = R::load('post', $_POST["card_id"]);
}
if($_POST["card_from"] == '/post-portfolio.php'){
	$update = R::load('portfolio', $_POST["card_id"]);
}

unlink($_POST["src"]);

$num = $_POST["index"];
$update["example_"."$num"] = NULL;

R::store($update);






?>