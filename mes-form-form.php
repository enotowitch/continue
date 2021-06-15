<?
	if($_POST["card_from"] == '/index.php'){
		$apply_find = R::find('portfolio', 'user_id = ?', [$_SESSION['user']['id']]);
	}
	if($_POST["card_from"] == '/portfolios.php'){
		$apply_find = R::find('post', 'user_id = ?', [$_SESSION['user']['id']]);
	}
?>

<form class="mes-form">

<input name="card_from" type="hidden" value="<? echo $_POST["card_from"]; ?>">

<input name="user_to_id" type="hidden" value="<? echo $user_to_id; ?>">

<input name="user_from_id" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
<input name="user_from_mail" type="hidden" value="<? echo strtok($_SESSION['user']['mail'], '@'); ?>">

<!-- ! msg__write -->
<? if($_SERVER["PHP_SELF"] == '/mes.php'): ?>
<textarea class="msg__write" name="user_from_msg" placeholder="Type your message here..." autofocus></textarea>
<? endif; ?>

<!-- ! apply_id -->
<? if($_SERVER["PHP_SELF"] != '/mes.php'): ?>
<div class="applies">
Please select post which you apply with:

<? 
$i = 0;
foreach($apply_find as $apply_find): 
?>
	
	<input type="radio" id="apply_id<? echo $i; ?>"
     name="apply_id" value="<? echo $apply_find["id"]; ?>">
    <label for="apply_id<? echo $i; ?>"><? echo $apply_find["title"]; ?></label>


	 <? 
	 $i++;
	 ?>

<? endforeach; ?>
</div>
<? endif; ?>


<div class="inter-icons">
	<img class="apply mes-send mta" src="img/icons/apply.svg" alt="mes-send">
</div>

</form>

<script>
var card_id = $('.clicked').closest('.card__content').find('.card_id').val();
$('.mes-form').append('<input name="card_id" type="hidden" value="'+card_id+'">');

// ! apply_id

$('.applies').find('[type="radio"]').eq('0').attr('checked', 'checked');

if($('.applies').find('[type="radio"]').length == 1){
	// waiting for anim
	setTimeout(() => {
		$('.mes-send').trigger('click');
	}, 400);
}
if($('.applies').find('[type="radio"]').length == 0){
	$('.card-mes').find('.apply').hide();
	if(card_from == '/index.php'){
		$('.applies').html('<a class="brand" href="/post-portfolio.php">Post Portfolio</a> and than just 1 click apply!;)')
	}
	if(card_from == '/portfolios.php'){
		$('.applies').html('<a class="brand" href="/post-job.php">Post Job</a> and than just 1 click apply! ;)')
	}
}

// ! mes-send yet clicked - prevent sending more than 1 apply

$('.mes-send').on('click', function(e){

	$(e.target).closest('.card').append('<div class="post-anim"></div>');


	$('.post-anim').animate({ 'width': '100%' });

	setTimeout(() => {
		// waiting for anim
		$('.post-anim').detach();
		$(e.target).closest('.card').hide();
	}, 400);


})

$('.mes-send').css({'margin-top': '128px'})

</script>