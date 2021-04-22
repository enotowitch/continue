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
			To <? if_page('/post-job.php', 'post jobs', 'add portfolios'); ?>, please <a href="login.php"><nobr>SIGN IN</a> or <a href="reg.php">SIGN UP</nobr></a>
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

			<div class="title-and-subt">
				<textarea class="card__title" name="title" placeholder="Type in POSITION" maxlength="40"
								minlength="4"></textarea>
							<textarea class="card__subt" name="subt" placeholder="Type in YOUR COMPANY NAME" maxlength="50"
								minlength="2"></textarea>
			</div>
			
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
<? 
require_once "card-content.php";
?>

		</div>


		<!-- ? 2 CARD -->
		<img class="cross cross_post" src="img/icons/cross.svg" alt="cross">
	</div>
</div>


<!-- ! TEST CARDs -->

<div class="your-posts">
<? if_page('/post-job.php', "YOUR POSTS:", "YOUR PORTFOLIOS:") ?>
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