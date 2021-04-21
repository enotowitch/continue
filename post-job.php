<?
session_start();
require_once "header.php";
?>

<?
	require_once "search.php";
?>
<div class="bg">
	<div class="cards-wrapper">
		<!-- ! log-as -->
		<? 
			require_once "log-as.php"
		?>
		<!-- ? log-as -->
		<!-- ! no user -->
		<? if($_SESSION["user"] == NULL): ?>
			<div class="no-user">
			To <? if($_SERVER['PHP_SELF'] == '/post-job.php'){echo "post";}else{echo "add";} ?> <? if($_SERVER['PHP_SELF'] == '/post-job.php'){echo "jobs";}else{echo "portfolios";} ?>, please <a href="login.php"><nobr>SIGN IN</a> or <a href="reg.php">SIGN UP</nobr></a>
			</div>
			<script>
				$(document).ready(function(){
					$('.card').addClass('op05');
					$('input, textarea, select, label').prop('disabled', true);
				})
			</script>
			
		<? endif; ?>
		<!-- ? no user -->
		<!-- ! CARD -->
		<form class="card form-card not100">
			<!-- ! user_id -->
			<input class="user_id" name="user_id" type="hidden" value="<? echo $_SESSION["user"]["id"]; ?>">
			<!-- ? user_id -->
			<!-- ! card_from -->
			<input class="card_from" name="card_from" type="hidden" value="<? echo $_SERVER['PHP_SELF'] ?>">
			<!-- ? card_from -->
			<label class="card__logo add-logo" for="fake-logo">
				<div class="add-logo__line"></div>
				<input class="fake-logo" type="file" id="fake-logo">
			</label>
			<textarea class="card__title" name="title" placeholder="Type a job title you're looking for..." maxlength="40"
				minlength="4"></textarea>
			<textarea class="card__subt" name="subt" placeholder="Type your company name..." maxlength="50"
				minlength="2"></textarea>
			<? 
				require_once "info-select.php"
			?>
			<div class="inter-icons">
				<input class="cross_small" type="reset" value="">
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
							<div class="info__cell info__simple">Examples</div>
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
		<img class="cross cross_post" src="img/icons/cross.svg" alt="cross">
	</div>
</div>


<!-- ! TEST CARDs -->

<div class="your-posts">
<? if($_SERVER['PHP_SELF'] == '/post-job.php'){echo "YOUR POSTS:";}else{echo "YOUR PORTFOLIOS:";} ?>
</div>

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