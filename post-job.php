<?
session_start();
require_once "header.php";
?>

<?
	require_once "search.php";
?>
<div class="post bg">
	<div class="cards-wrapper">

		<!-- ! no user -->
		<? include "no-user.php"; ?>
		<!-- ? no user -->
		<!-- ! CARD -->
<? 
include "post-form.php";
?>
		<!-- ? CARD -->
		<img class="arrow" src="img/icons/arrow.svg" alt="arrow">
		<!-- ! 2 CARD -->

		<div class="card card2 not100">

			<!-- ! example -->
		<div class="card__content usn">
	
	<img class="card__logo" src="img/bitten-donut.jpg" alt="card__logo">
	<div class="all-card-flex">
		<div class="title-and-subt">
			<div class="card__title">
				Artist, Developer, Generalist
			</div>
			<div class="card__subt">
				Microsoft, Apple, Google
			</div>
		</div>
	
		<div class="info">
			<div class="info__flex">
				<div class="info__block">
					<div class="info__cell info__simple">
					3000 USD
					</div>
					<div class="info__cell info__simple">
					Permanent
					</div>
				</div>
				<div class="info__block">
					<div class="info__cell info__simple">
					10 years
					</div>
					<div class="info__cell info__simple">
					150 h/mo
					</div>
				</div>
				<div class="info__block">
					<div class="info__cell info__simple">
					United States
					</div>
					<div class="info__cell info__simple">
					Examples
					</div>
				</div>
			</div>
		</div>
		<div class="tags-pics-flex">
			<div class="tags tags_main tags_post">
				<div class="tag tag_main">
				art
				</div>
				<div class="tag tag_main">
				UX / UI
				</div>
				<div class="tag tag_main">
				back-end
				</div>
			</div>
			<div class="info__cell info__simple">
				<? for($i=1;$i<=10;$i++): ?>
				<? if($post["example_$i"] != NULL): ?>
				<img data-lazy="<? echo $post["example_$i"]; ?>" src="img/white.png">
				<? endif; ?>
				<? endfor; ?>
			</div>
		</div>
	</div>
	
	<div class="inter-icons">
		<input disabled class="cross_reset" type="reset" value="">
		<img class="apply ok-gray" src="img/icons/info-ok.svg" alt="info-ok">
	</div>
</div>

		</div>


		<!-- ? 2 CARD -->
		<img class="cross cross_post" src="img/icons/cross.svg" alt="cross">
	</div>
</div>


<!-- ! TEST CARDs -->

<!-- ! your -->
<? include "your.php"; ?>
<!-- ? your -->

<div class="sort-flex">
<!-- ! switch -->
<?
	require_once "switch.php"
?>
<!-- ? switch -->
</div>

<!-- ! CARD -->
<div class="card-flex">

<? 
	require_once "DB.php";
	// ! SHOW ONLY MY POSTS
	if($_SERVER['PHP_SELF'] == '/post-job.php'){
		$posts = R::find('post', 'user_id = ?', [$_SESSION["user"]["id"]], 'ORDER BY id DESC');
	}
	if($_SERVER['PHP_SELF'] == '/post-portfolio.php'){
		$posts = R::find('portfolio', 'user_id = ?', [$_SESSION["user"]["id"]], 'ORDER BY id DESC');
	}

	foreach($posts as $post): 
	
?>

	<div class="card card_main w100">
		<? 
			include "card-content.php"
		?>
	</div>
	
<? endforeach; ?>

	

</div>

<!-- ? CARD -->


<!-- ? TEST CARDs -->

<?
 require_once "footer.php";
?>