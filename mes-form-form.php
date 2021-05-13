<form class="mes-form">
<input name="user_to_id" type="hidden" value="<? echo $user_to_id; ?>">

<input name="user_from_id" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
<input name="user_from_mail" type="hidden" value="<? echo strtok($_SESSION['user']['mail'], '@'); ?>">


<textarea class="msg__write" name="user_from_msg" placeholder="Type your message here..." autofocus></textarea>

<div class="inter-icons">
	<img class="apply mes-send mta" src="img/icons/apply.svg" alt="mes-send">
</div>

</form>

<script>
var card_id = $('.clicked').closest('.card__content').find('.card_id').val();
$('.mes-form').append('<input name="card_id" type="hidden" value="'+card_id+'">');
</script>