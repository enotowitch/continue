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





<!-- ! CARD -->
<div class="card-flex">


<? 
	require_once "DB.php";
	
	if($_SERVER['PHP_SELF'] == '/index.php'){
		$posts = load_all_num_posts('job');
	}
	// !!!
	if($_SERVER['PHP_SELF'] == '/portfolios.php'){
		$posts = load_all_num_posts('folio');
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

<div class="load-more">load 10 posts</div>

<!-- ? CARD -->

<?
 require_once "footer.php";
?>



