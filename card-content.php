<div class="card__content">
	<!-- ! card_id -->
	<input class="card_id" type="hidden"
		value="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->id;}else{echo $portfolio->id;} ?>">
	<!-- ? card_id -->
	<!-- ! card_from -->
	<input class="card_from" type="hidden" value="<? echo $_SERVER['PHP_SELF'] ?>">
	<!-- ? card_from -->
	<img class="card__logo"
		src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->logo;}else{echo $portfolio->logo;} ?>"
		alt="card__logo">
	<div class="card__title">
		<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->title;}else{echo $portfolio->title;} ?>
	</div>
	<div class="card__subt">
		<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->subt;}else{echo $portfolio->subt;} ?>
	</div>
	<div class="info">
		<div class="info__flex">
			<div class="info__block">
				<div class="info__cell info__simple">
					<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->salary;}else{echo $portfolio->salary;} ?>
				</div>
				<div class="info__cell info__simple">
					<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->duration;}else{echo $portfolio->duration;} ?>
				</div>
			</div>
			<div class="info__block">
				<div class="info__cell info__simple">
					<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->experience;}else{echo $portfolio->experience;} ?>
				</div>
				<div class="info__cell info__simple">
					<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->workload;}else{echo $portfolio->workload;} ?>
				</div>
			</div>
			<div class="info__block">
				<div class="info__cell info__simple">
					<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->location;}else{echo $portfolio->location;} ?>
				</div>
				<div class="info__cell info__simple">
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
				<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->tag_1;}else{echo $portfolio->tag_1;} ?>
			</div>
			<div class="tag tag_main">
				<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->tag_2;}else{echo $portfolio->tag_2;} ?>
			</div>
			<div class="tag tag_main">
				<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->tag_3;}else{echo $portfolio->tag_3;} ?>
			</div>
		</div>
		<div class="info__cell info__simple info__pics">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_1;}else{echo $portfolio->example_1;} ?>"
				alt="1">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_2;}else{echo $portfolio->example_2;} ?>"
				alt="2">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_3;}else{echo $portfolio->example_3;} ?>"
				alt="3">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_4;}else{echo $portfolio->example_4;} ?>"
				alt="4">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_5;}else{echo $portfolio->example_5;} ?>"
				alt="5">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_6;}else{echo $portfolio->example_6;} ?>"
				alt="6">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_7;}else{echo $portfolio->example_7;} ?>"
				alt="7">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_8;}else{echo $portfolio->example_8;} ?>"
				alt="8">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_9;}else{echo $portfolio->example_9;} ?>"
				alt="9">
			<img
				src="<? if($_SERVER['PHP_SELF'] == '/index.php'){echo $post->example_10;}else{echo $portfolio->example_10;} ?>"
				alt="10">
		</div>
	</div>
</div>