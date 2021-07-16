<?
session_start();
if($_SESSION["user"]["id"] != NULL){
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



<? if($_GET): ?>
	<script>
		$(document).ready(function(){
		$('[name="user_mail"]').val(`<? echo $_GET['mail']; ?>`);
		$('[name="user_pass"]').val(`<? echo $_GET['pass']; ?>`);
		$('.sign-in').trigger('click');
		});
		<? if($_GET["role"] == 'maker'): ?>
			setTimeout(() => {
			window.location.href = '/post-portfolio.php';				
			}, 500);
		<? endif; ?>
		<? if($_GET["role"] == 'hirer'): ?>
			setTimeout(() => {
			window.location.href = '/post-job.php';				
			}, 500);
		<? endif; ?>
		<? if($_GET["role"] == ''): ?>
			setTimeout(() => {
				window.location.href = '/profile.php';			
			}, 500);
		<? endif; ?>
	</script>
<? endif; ?>