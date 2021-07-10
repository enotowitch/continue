<? 
$posted = $post->time;
$posted = date('Y-m-d H:i:s', $posted);
?>

<div class="card__content">
	<!-- ! card_id -->
	<input class="cat" type="hidden" value="<? echo $post->cat; ?>">
	<!-- ? card_id -->
	<!-- ! card_id -->
	<input class="card_id" type="hidden" value="<? echo $post->id; ?>">
	<!-- ? card_id -->
	<!-- ! user_id -->
	<input class="user_id" type="hidden" value="<? echo $post->user_id; ?>">
	<!-- ? user_id -->
	<!-- ! current_user -->
	<input class="current_user" type="hidden" value="<? echo $_SESSION['user']['id']; ?>">
	<!-- ? current_user -->
	<!-- ! card_from -->
	<input class="card_from" type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>">
	<!-- ? card_from -->
	<img class="card__logo" src="<? echo $post->logo; ?>" alt="card__logo">
	<div class="inner-card-flex">
		<div class="title-and-subt">
			<div class="card__title">
				<? echo $post->title; ?>
			</div>
			<div class="card__subt">
				<? echo $post->subt; ?>
			</div>
		</div>
	
		<div class="info">
			<div class="info__flex">
				<div class="info__block">
					<div class="info__cell info__simple salary" id="salary">
						<? echo $post->salary; ?>
					</div>
					<div class="info__cell info__simple duration" id="duration">
						<? echo $post->duration; ?>
					</div>
				</div>
				<div class="info__block">
					<div class="info__cell info__simple experience" id="experience">
						<? echo $post->experience; ?>
					</div>
					<div class="info__cell info__simple workload" id="workload">
						<? echo $post->workload; ?>
					</div>
				</div>
				<div class="info__block">
					<div class="info__cell info__simple location" id="location">
						<? echo $post->location; ?>
					</div>
					<div class="info__cell info__simple example">
						Examples
					</div>
				</div>
			</div>
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
				<? if($post["example_$i"] != NULL): ?>
				<img class="img-zoom" data-lazy="<? echo $post["example_$i"]; ?>" src="">
				<? endif; ?>
				<? endfor; ?>
			</div>
		</div>
	</div>
	
	<div class="inter-icons">
		<img class="hide" src="img/icons/delete.svg" alt="del">
		<img class="like" src="img/icons/like.svg" alt="like">
		<img class="apply" src="img/icons/apply.svg" alt="apply">
	</div>
<? if($_SERVER['PHP_SELF'] == '/index.php' || $_SERVER['PHP_SELF'] == '/post-job.php' || $_SERVER['PHP_SELF'] == '/filter-card.php'): ?>
	<div class="time"><? echo time_elapsed_string($posted); ?></div>
<? endif; ?>
</div>

<? if($_SERVER['PHP_SELF'] != '/post-job.php' || $_SERVER['PHP_SELF'] != '/post-portfolio.php'): ?>
	<script> $('.apply').not('.ok-gray').addClass('get-mes-form'); </script>
<? endif; ?>