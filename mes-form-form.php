<form>
<input name="user_to_id" type="hidden" value="<? echo $user_to_id; ?>">

<input name="user_from_id" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
<input name="user_from_mail" type="hidden" value="<? echo strtok($_SESSION['user']['mail'], '@'); ?>">


<textarea class="msg__write" name="user_from_msg"></textarea>
<img class="apply mes-send" src="img/icons/apply.svg" alt="apply">
</form>