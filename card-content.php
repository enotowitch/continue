<div class="card__content">
	<!-- ! card-id -->
	<input class="card-id" type="hidden" value="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->id;}else{echo $portfolio->id;} ?>">
	<!-- ? card-id -->
	<img class="card__logo" src="img/applicantLogo.png" alt="card__logo">
	<div class="card__title">
		<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->title;}else{echo $portfolio->title;} ?>
	</div>
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
		<img class="del" src="img/icons/delete.svg" alt="del">
		<img class="like" src="img/icons/like.svg" alt="like">
		<img class="apply" src="img/icons/apply.svg" alt="apply">
	</div>
	<div class="tags">
		<div class="tag">jdfjkfjkhfghf</div>
		<div class="tag">пропропропропро</div>
		<div class="tag">итьит</div>
	</div>
</div>
