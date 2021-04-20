<div class="card__content">
	<!-- ! card_id -->
	<input class="card_id" type="hidden"
		value="<? echo $post->id; ?>">
	<!-- ? card_id -->
	<!-- ! user_id -->
	<input class="user_id" type="hidden"
		value="<? echo $post->user_id; ?>">
	<!-- ? user_id -->
	<!-- ! current_user -->
	<input class="current_user" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
	<!-- ? current_user -->
	<!-- ! card_from -->
	<input class="card_from" type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>">
	<!-- ? card_from -->
	<img class="card__logo"
		src="<? echo $post->logo; ?>"
		alt="card__logo">
	<div class="card__title">
		<? echo $post->title; ?>
	</div>
	<div class="card__subt">
		<? echo $post->subt; ?>
	</div>
	<div class="info">
		<div class="info__flex">
			<div class="info__block">
				<div class="info__cell info__simple">
					<? echo $post->salary; ?>
				</div>
				<div class="info__cell info__simple">
					<? echo $post->duration; ?>
				</div>
			</div>
			<div class="info__block">
				<div class="info__cell info__simple">
					<? echo $post->experience; ?>
				</div>
				<div class="info__cell info__simple">
					<? echo $post->workload; ?>
				</div>
			</div>
			<div class="info__block">
				<div class="info__cell info__simple">
					<? echo $post->location; ?>
				</div>
				<div class="info__cell info__simple ex">
					Examples
				</div>
			</div>
		</div>
	</div>
	<div class="inter-icons">
		<img class="del" src="img/icons/delete.svg" alt="del">
		<img class="like" src="img/icons/like.svg" alt="like">
		<img class="apply" src="img/icons/apply.svg" alt="apply">
	</div>
	<div class="tags-pics-flex">
		<div class="tags tags_main">
			<div class="tag tag_main">
				<? echo $post->tag_1; ?>
			</div>
			<div class="tag tag_main">
				<? echo $post->tag_2; ?>
			</div>
			<div class="tag tag_main">
				<? echo $post->tag_3; ?>
			</div>
		</div>
		<div class="info__cell info__simple info__pics">
		<? for($i=1;$i<=10;$i++): ?>
		<? if($post["example_$i"] != NULL || $portfolio["example_$i"] != NULL): ?>
			<img
				src="<? echo $post["example_$i"]; ?>"
				alt="1">
		<? endif; ?>
		<? endfor; ?>
		</div>
	</div>
</div>