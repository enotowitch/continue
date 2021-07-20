<?
session_start();
 if($_SESSION["user"] != NULL){
	header("location: profile.php");
}
 require_once "header.php";
?>


<?
 require_once "user-form.php";
?>

<?
 require_once "footer.php";
?>