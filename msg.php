<?
	require_once "DB.php";
?>



<div class="msg <? if_page('/mes.php', 'msg-single'); ?>">
	<!-- ! applied_to_card -->
	<input type="hidden" name="applied_to_card" value="<? echo $my_msg->applied_to_card; ?>">
	<!-- ? applied_to_card -->
	<!-- ! applied_to_cat -->
	<input type="hidden" name="applied_to_cat" value="<? echo $my_msg->applied_to_cat; ?>">
	<!-- ? applied_to_cat -->
	<img class="card__logo" src="<? echo $my_msg->user_from_logo; ?>" alt="card__logo">
	<div class="title-and-subt">
		<div class="msg__title">
			<? echo $my_msg->user_from_mail; ?>
		</div>
		<div class="msg__body">
			<? echo $my_msg->user_from_msg; ?>
		</div>
		<!-- ! About Post -->
		<div class="msg__about">
			About Post: <? echo $my_msg->apply_title; ?>
		</div>
		<!-- ? About Post -->
	</div>

</div>