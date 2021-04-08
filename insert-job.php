<?
	require "DB.php";

	$title = $_POST['title'];

	$post = R::dispense('post');

	$post->title = $title;

	R::store( $post );
?>