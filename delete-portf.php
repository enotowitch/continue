<?
	require "DB.php";

$card_id = $_POST['card_id'];

$delete = R::hunt('portfolio', 'id = ?', [$card_id]);


?>