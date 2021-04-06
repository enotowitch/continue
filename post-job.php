<?
	require_once "header.php";
?>
<div class="bg">
	<div class="cards-wrapper">
		<!-- ! CARD -->
		<form class="card form-card prevent100">
			<label class="card__logo add-logo" for="fake-logo">
				<div class="add-logo__line"></div>
				<input class="fake-logo" type="file" id="fake-logo">
			</label>
			<textarea class="card__title" placeholder="Type a job title you're looking for..." maxlength="40"
				minlength="4"></textarea>
			<textarea class="card__subt" placeholder="Type your company name..." maxlength="50" minlength="2"></textarea>
			<? 
				require_once "info-select.php"
			?>
			<div class="inter-icons">
				<img class="del" src="img/del" alt="del">
				<img class="like" src="img/like" alt="like">
				<input class="apply" type="submit" value="SUBMIT">
			</div>
			<div class="tags">
				<? 
					require_once "tags-select.php"
				?>
			</div>
		</form>
		<!-- ? CARD -->
		<img class="arrow" src="img/icons/arrow.svg" alt="arrow">
		<!-- ! 2 CARD -->

		<div class="card card2 prevent100">
			<? 
				require "card-content.php"
			?>
		</div>


		<!-- ? 2 CARD -->
		<img class="cross" src="img/icons/cross.svg" alt="cross">
	</div>
</div>


<!-- ! TEST CARDs -->

<div class="switch">
	switch
</div>




<!-- ? TEST CARDs -->

<?
 require_once "footer.php";
?>