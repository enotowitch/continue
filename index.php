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


	<!-- ! search-result -->
	<div class="search-result"></div>
	<!-- ? search-result -->


<!-- ! CARD -->
<div class="card-flex">


<? 
	require_once "DB.php";
	
	if($_SERVER['PHP_SELF'] == '/index.php'){
		// prevent errors
		$hidden_arr = array();
		$messaged_arr = array();

		$posts = R::find('post', 'ORDER BY id DESC');
		foreach($posts as $post){
			$all_arr[] = $post["id"];
		}
		// ! hidden
		$hidden = R::find('hide', 'user_id = ?', [$_SESSION["user"]["id"]]);
		foreach($hidden as $hidden){
			$hidden_arr[] = $hidden["card_id"];
		}		
		// ! messaged
		$messaged = R::find('mesd', 'user_id = ?', [$_SESSION["user"]["id"]]);
		foreach($messaged as $messaged){
			$messaged_arr[] = $messaged["card_id"];
		}	
		$result = array_diff($all_arr, $hidden_arr, $messaged_arr);
		// filtered posts
		$posts = R::loadAll('post', $result);

	}
	// !!!
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



