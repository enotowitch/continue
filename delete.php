<?
	require "DB.php";

$card_id = $_POST['card_id'];
$card_from = $_POST['card_from'];

if($card_from == '/index.php'){
	$delete = R::hunt('post', 'id = ?', [$card_id]);
}
if($card_from == '/portfolios.php'){
	$delete = R::hunt('portfolio', 'id = ?', [$card_id]);
}

?>