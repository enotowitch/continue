<?
session_start();
if($_SESSION["user"]["id"] == NULL){
	header("location: login.php");
}


 require_once "header.php";
?>

<!-- ! log-as -->
<? 
		require_once "log-as.php"
	?>
	<!-- ? log-as -->

<div class="your">YOUR PROFILE</div>
<?
	require_once "change-page.php";
?>

