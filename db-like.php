<?
 session_start();
 require_once "DB.php";

 $likes = R::find('like', 'user_id = ?', [$_SESSION["user"]["id"]]);



$arr = array();

 foreach($likes as $like){

	$arr[] = $like["card_id"];

 }

 if($_SERVER['PHP_SELF'] == '/jobs-like.php'){
	$posts = R::loadAll('post', $arr);
 }
 if($_SERVER['PHP_SELF'] == '/port-like.php'){
	$posts = R::loadAll('portfolio', $arr);
 }


 $user = R::load('user', $_SESSION["user"]["id"]);

?>

<div class="card-flex">

	<? foreach($posts as $post): ?>
	
		<? if($post['id'] != "0"): ?>
		
		<div class="card card_main <? echo $user["size"]; ?>">
			<? 
				include "card-content.php";
			?>
		</div>
		
		<? endif; ?>
		
	<? endforeach; ?> 

</div>