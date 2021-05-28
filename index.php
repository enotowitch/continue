<?
session_start();
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
<div class="sort-flex">
<a class="brand-del" href="<? if_page('/index.php', '/jobs-del.php', '/port-del.php'); ?>">HIDDEN</a>
<a class="brand-like" href="<? if_page('/index.php', '/jobs-like.php', '/port-like.php'); ?>">LIKED</a>
<a class="brand" href="<? if_page('/index.php', '/jobs-mes.php', '/port-mes.php'); ?>">MESSAGED</a>
<div class="sort-my">ALL/MY</div>
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
	
	if($_SERVER['PHP_SELF'] == '/index.php'){
		$posts = R::find('post', 'ORDER BY id DESC');
	}
	if($_SERVER['PHP_SELF'] == '/portfolios.php'){
		$posts = R::find('portfolio', 'ORDER BY id DESC');
	}
	
	$user = R::load('user', $_SESSION["user"]["id"]);

	foreach($posts as $post): 
	
?>

	<div class="card card_main <? echo $user["size"]; ?>">
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



