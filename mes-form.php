<?
session_start();
require_once "DB.php";

// to show mail
$user_owner = R::find('user', 'id = ?', [$_POST['user_to_id']]);


?>

<? foreach($user_owner as $user_owner): ?>

<form>
<input name="user_to_id" type="hidden" value="<? echo $_POST['user_to_id']; ?>">

<input name="user_from_id" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
<input name="user_from_mail" type="hidden" value="<? echo strtok($_SESSION['user']['mail'], '@'); ?>">

<div>Message to: <? echo strtok($user_owner->user_mail, '@'); ?></div>

<div>Message from: (YOU) <? echo $_SESSION['user']['mail']; ?> </div>
<textarea class="msg__write" name="user_from_msg"></textarea>
<img class="apply mes-send" src="img/icons/apply.svg" alt="apply">
</form>

<? endforeach; ?>