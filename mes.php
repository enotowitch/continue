<? 
session_start();
require_once "header.php";
require_once "DB.php";

// ! $difference bw forms mes.php & mes-form.php
$user_to_id = $_GET['from'];

	// var_dump($_GET['from']);

	$my_msg = R::find('message', 'user_to_id = ? AND user_from_id = ? OR user_from_id = ? AND user_to_id = ?', [$_SESSION['user']['id'], $_GET['from'], $_SESSION['user']['id'], $_GET['from']]);

?>


<div class="mes-wrap">
	<div class="mes-inner">

	<? foreach($my_msg as $my_msg): ?>

		<? if($my_msg["user_from_msg"] == NULL){
			continue;
		} ?>
	
	<!-- ! msg -->
		<? require "msg.php"; ?>
	<!-- ? msg -->
	
	<? endforeach; ?>
	</div>

	<? include "mes-form-form.php"; ?>

</div>




<?
 require_once "footer.php";
?>