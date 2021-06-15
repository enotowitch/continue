<?
 session_start();
 require_once "DB.php";

 $hide = R::find('hide', 'user_id = ?', [$_SESSION["user"]["id"]]);



$arr = array();

 foreach($hide as $hide){

	$arr[] = $hide["card_id"];

 }

 if($_SERVER['PHP_SELF'] == '/jobs-del.php'){
	$posts = R::loadAll('post', $arr);
 }
 if($_SERVER['PHP_SELF'] == '/port-del.php'){
	$posts = R::loadAll('portfolio', $arr);
 }




?>

<div class="card-flex">

	<!-- ! card_from -->
	<input class="card_from" type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>">
	<!-- ? card_from -->

	<? foreach($posts as $post): ?>
	
		<? if($post['id'] != "0"): ?>
		
		<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">
			<? 
				include "card-content.php";
			?>
		</div>
		
		<? endif; ?>
		
	<? endforeach; ?> 

</div>