<?
session_start();
if($_SESSION["user"]["id"] == NULL){
	header("location: login.php");
}


 require_once "header.php";
?>

<?
	require_once "search.php";
?>

<!-- ! log-as -->
<? 
		require_once "log-as.php"
	?>
	<!-- ? log-as -->

<div class="your mb2x">YOUR PROFILE</div>
<?
	require_once "change-page.php";
?>





