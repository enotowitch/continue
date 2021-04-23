<? 
session_start();
require_once "header.php";
require_once "DB.php";

	// var_dump($_GET['from']);

	$my_msg = R::find('message', 'user_to_id = ? AND user_from_id = ? OR user_from_id = ? AND user_to_id = ?', [$_SESSION['user']['id'], $_GET['from'], $_SESSION['user']['id'], $_GET['from']]);


	// var_dump($my_msg);

	

?>

<? foreach($my_msg as $my_msg): ?>


	<div class="msg">
		<div class="msg__from"><? echo $my_msg->user_from_mail; ?></div>
		<div class="msg__body"><? echo $my_msg->user_from_msg; ?></div>
	</div>

<? endforeach; ?>




<form>

	<input name="user_to_id" type="hidden" value="<? echo $_GET['from']; ?>">

	<input name="user_from_id" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
	<input name="user_from_mail" type="hidden" value="<? echo strtok($_SESSION['user']['mail'], '@'); ?>">

	<textarea class="msg__write" name="user_from_msg"></textarea>
	<img class="apply mes-send" src="img/icons/apply.svg" alt="apply">
</form>

<?
 require_once "footer.php";
?>