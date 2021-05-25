<? 
require_once "DB.php";

unlink($_POST["src"]);

$num = $_POST["index"];


$update = R::load('post', $_POST["card_id"]);

$update["example_"."$num"] = NULL;

R::store($update);






?>