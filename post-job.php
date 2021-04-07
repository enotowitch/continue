<?
	require_once "header.php";
?>
<div class="bg">
	<div class="cards-wrapper">
		<!-- ! CARD -->
		<form class="card form-card not100">
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
				<input class="del cross_small" type="reset" value="">
				<input class="apply ok-gray" type="submit" value="">
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

		<div class="card card2 not100">
			<div class="card__content">
				<img class="card__logo" src="img/applicantLogo.png" alt="card__logo">
				<div class="card__title">2d Artist, Illustrator test</div>
				<div class="card__subt">Company Name</div>
				<div class="info">
					<div class="info__flex">
						<div class="info__block">
							<div class="info__cell info__simple">20009999 USD</div>
							<div class="info__cell info__simple">Temporary</div>
						</div>
						<div class="info__block">
							<div class="info__cell info__simple">44 years</div>
							<div class="info__cell info__simple">111 h/mo</div>
						</div>
						<div class="info__block">
							<div class="info__cell info__simple">Afghanistan 2 Afghanistan</div>
							<div class="info__cell info__simple">Example</div>
						</div>
					</div>
				</div>
				<div class="inter-icons">
					<img class="apply apply_ok" src="img/icons/info-ok.svg" alt="apply">
				</div>
				<div class="tags">
					<div class="tag">jdfjkfjkhfghf</div>
					<div class="tag">пропропропропро</div>
					<div class="tag">итьит</div>
				</div>
			</div>

		</div>


		<!-- ? 2 CARD -->
		<img class="cross cross_mb" src="img/icons/cross.svg" alt="cross">
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