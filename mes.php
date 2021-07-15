<? 
session_start();
require_once "header.php";
require_once "DB.php";

// ! $difference bw forms mes.php & mes-form.php
$user_to_id = $_GET['from'];

	$writing_to = R::load('user', $_GET['from']);

	$my_msg = R::find('message', 'user_to_id = ? AND user_from_id = ? OR user_from_id = ? AND user_to_id = ?', [$_SESSION['user']['id'], $_GET['from'], $_SESSION['user']['id'], $_GET['from']]);

	

	$post = R::load('post', $_GET['about']);

?>


<div class="mes-wrap">

<div class="writing_to">Messages to user: <span class="brand"><? echo strtok($writing_to['user_mail'], '@'); ?></span></div>

<!-- ! about -->
<div class="writing_to">About:</div>
<div class="card card_main w100">
	<? 
		include "card-content.php";
	?>
</div>
<!-- ? about -->


	<div class="mes-inner">

	<? foreach($my_msg as $my_msg): ?>

		<? if($my_msg["user_from_msg"] == NULL){
			continue;
		} ?>
	
	<!-- ! msg -->
		<? require "msg.php"; ?>
	<!-- ? msg -->
	
	<? endforeach; ?>
	</div>

	<? include "mes-form-form.php"; ?>

</div>




<?
 require_once "footer.php";
?>


<script>
	// ! ready
	$(document).ready(function(){
		setTimeout(() => {
			$('.db-messaged').removeClass('dn');
			$('.db-hidden').removeClass('dn');
			$('.info__pics').slick('refresh');
		}, 300);
	})


$('.card').find('.inter-icons').hide();
// this is in DB: applied_to_card
$('.mes-form').find('[name="card_id"]').val('<? echo $_GET['about']; ?>');

var about = $('[name="applied_to_card"]').val();
var cat = $('[name="applied_to_cat"]').val();

// first time you go to each message it adds 'about' and 'cat' to url
if(!window.location.href.includes('&')){
window.location.href = `/mes.php?from=<? echo $_GET['from']; ?>&about=${about}&cat=${cat}`;
}

// push title to mes apply_title
var title = $('.card').find('.card__title').text().trim();
$('.mes-form').append(`<input type="hidden" name="apply_title" value="${title}">`);


</script>