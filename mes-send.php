<? 
require_once "DB.php";

var_dump($_POST);

$message = R::dispense('message');

$message->user_to_id = $_POST['user_to_id'];

$message->user_from_id = $_POST['user_from_id'];
$message->user_from_mail = $_POST['user_from_mail'];
$message->user_from_msg = $_POST['user_from_msg'];

R::store($message);


?>