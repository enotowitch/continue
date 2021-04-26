<?
	require_once "DB.php";
?>



<div class="msg">
	<img class="card__logo" src="<? echo $my_msg->user_from_logo; ?>" alt="card__logo">
	<div class="title-and-subt">
		<div class="card__title msg__from">
			<? echo $my_msg->user_from_mail; ?>
		</div>
		<div class="card__subt msg__body">
			<? echo $my_msg->user_from_msg; ?>
		</div>
	</div>

</div>