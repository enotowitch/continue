<?
session_start();
	require_once "header.php";
?>
<?
	require_once "search.php";
?>
<!-- ! banner -->
<div class="banner"><img src="img/banner.gif"></div>
<!-- ? banner -->
<!-- ! change-page -->
<?
	require_once "change-page.php";
?>
<!-- ? change-page -->


<!-- ! switch -->
<?
	include_once "filters.php";
?>
<!-- ? switch -->



<!-- ! CARD -->
<div class="card-flex">

<? 
	require_once "DB.php";
	
	if($_SERVER['PHP_SELF'] == '/index.php'){
		$posts = R::find('post', 'ORDER BY id DESC');
	}
	if($_SERVER['PHP_SELF'] == '/portfolios.php'){
		$posts = R::find('portfolio', 'ORDER BY id DESC');
	}
	


	foreach($posts as $post): 
	
?>

	<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">
		<? 
			include "card-content.php";
		?>
	</div>
	
<? endforeach; ?>

	

</div>

<!-- ? CARD -->

<?
 require_once "footer.php";
?>



