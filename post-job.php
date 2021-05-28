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
		<? 
			include "card-content.php";
		?>
		
		</div>
		<!-- ? 2 CARD -->

		<img class="cross cross_post" src="img/icons/cross.svg" alt="cross">
	</div>
</div>


<!-- ! your -->
<? include "your.php"; ?>
<!-- ? your -->

<div class="sort-flex">
<!-- ! switch -->
<?
	include_once "switch-size.php";
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


<?
 require_once "footer.php";
?>

<script>

$('.card2').find('.card__content').addClass('usn');
$('.card2').find('.card__logo').attr('src', 'img/bitten-donut.jpg');	
$('.card2').find('.card__title').text('Artist, Developer, Generalist');	
$('.card2').find('.card__subt').text('Microsoft, Apple, Google');	
$('.card2').find('.info__simple').eq(0).text('3000 USD');	
$('.card2').find('.info__simple').eq(1).text('Permanent');	
$('.card2').find('.info__simple').eq(2).text('10 years');	
$('.card2').find('.info__simple').eq(3).text('150 h/mo');	
$('.card2').find('.info__simple').eq(4).text('United States');	
$('.card2').find('.tag').eq(0).text('art');	
$('.card2').find('.tag').eq(1).text('UX / UI');	
$('.card2').find('.tag').eq(2).text('back-end');
$('.card2').find('.info__pics ').detach();	
$('.card2').find('.inter-icons').empty();
$('.card2').find('.inter-icons').append('<input disabled class="cross_reset">');
$('.card2').find('.inter-icons').append('<img src="img/icons/info-ok.svg" alt="info-ok">');
			
</script>

