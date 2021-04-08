<?
	require "DB.php";

	$title = $_POST['title'];

	$portfolio = R::dispense('portfolio');

	$portfolio->title = $title;

	R::store( $portfolio );
?>