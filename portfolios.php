<?
	require_once "header.php";
?>
<?
	require_once "search.php";
?>
<!-- ! banner -->
<div class="banner"></div>
<!-- ? banner -->
<!-- ! change-page -->
<?
	require_once "change-page.php";
?>
<!-- ? change-page -->
<!-- ! switch -->
<?
	require_once "switch.php"
?>
<!-- ? switch -->
<!-- ! CARD -->
<div class="card-flex">

<? 
	require_once "DB.php";
	$posts = R::find('portfolio');

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

