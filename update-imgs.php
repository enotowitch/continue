<? 
require_once "DB.php";



$update = R::load('post', $_POST["card_id"]);


unlink($_POST["src"]);

$num = $_POST["index"];
$update["example_"."$num"] = NULL;

R::store($update);






?>