<? 
session_start();
require_once "DB.php";

// ! sender of the message will get first card__logo(post->logo) as message logo 
$user_from_logo = R::getAll( 'SELECT logo FROM post WHERE user_id = :user_id',
[':user_id' => $_SESSION["user"]["id"]]
);


$message = R::dispense('message');

$message->user_to_id = $_POST['user_to_id'];

$message->user_from_logo = implode($user_from_logo[0]);

$message->user_from_id = $_POST['user_from_id'];
$message->user_from_mail = $_POST['user_from_mail'];
$message->user_from_msg = $_POST['user_from_msg'];

R::store($message);


?>