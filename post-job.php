<?
session_start();
require_once "header.php";
?>

<?
	require_once "search.php";
?>
<div class="post bg">
	<? if_page('/post-job.php', '<div class="post-smth">Post Job</div>', '<div class="post-smth">Post Portfolio</div>') ?>
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





<!-- ! CARD -->
<div class="card-flex">

<? 
	require_once "DB.php";
	// ! SHOW ONLY MY POSTS
	if($_SERVER['PHP_SELF'] == '/post-job.php'){
		$cat = 'job';	
	}
	if($_SERVER['PHP_SELF'] == '/post-portfolio.php'){
		$cat = 'folio';
	}
	$posts = load_my_num_posts($cat); 


	foreach($posts as $post): 
	
?>

	<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">
		<? 
			include "card-content.php"
		?>
	</div>
	
<? endforeach; ?>

	

</div>

<!-- ? CARD -->

<span hidden class="go-to-first">go to first</span>
<div hidden class="load-more"></div>

<?
 require_once "footer.php";
?>


<script>

$(document).ready(function(){
$('.card2').find('.card__content').addClass('usn');
$('.card2').find('.card__logo').attr('src', 'img/bitten-donut.jpg');	
$('.card2').find('.card__title').text('Artist, Developer, Generalist');	
$('.card2').find('.card__subt').text('Microsoft, Apple, Google');	
$('.card2').find('.info__simple').eq(0).text('$34/h');	
$('.card2').find('.info__simple').eq(1).text('Freelance').css({'padding-top':'4px'});	
$('.card2').find('.info__simple').eq(2).text('3 years');	
$('.card2').find('.info__simple').eq(3).text('176 h/mo').css({'padding-top':'4px'});	
$('.card2').find('.info__simple').removeClass('location').eq(4).text(' US ').prepend(`<img src="img/icons/flags/us.png">`);	
$('.card2').find('.info__simple').eq(5).html('<label class="info__cell info__example brand-bg">5/10</label>').css({'width':'94px', 'font-size': '13px', 'font-family': 'Montserrat'});	
$('.card2').find('.tag').eq(0).text('art');	
$('.card2').find('.tag').eq(1).text('UX / UI');	
$('.card2').find('.tag').eq(2).text('back-end');
$('.card2').find('.info__pics ').detach();	
$('.card2').find('.inter-icons').empty();
$('.card2').find('.inter-icons').append('<input disabled class="cross_reset">');
$('.card2').find('.inter-icons').append('<img src="img/icons/info-ok.svg" alt="info-ok">');
$('.card2').find('.time').hide();
})			
</script>



