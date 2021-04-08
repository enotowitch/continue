<?
	require "DB.php";

$card_id = $_POST['card_id'];

$delete = R::hunt('post', 'id = ?', [$card_id]);


?>