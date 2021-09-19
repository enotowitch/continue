<?
session_start();
if($_SESSION["user"]["id"] == NULL){
	header("location: login.php");
}
require_once "header.php";
require_once "log-as.php";
require_once "DB.php";



$jobs_posted = R::find('post', 'cat = ? AND user_id = ?', ['job', $_SESSION["user"]["id"]]);
$jobs_hidden = R::find('hidden', 'cat = ? AND user_id = ?', ['job', $_SESSION["user"]["id"]]);
$jobs_liked = R::find('liked', 'cat = ? AND user_id = ?', ['job', $_SESSION["user"]["id"]]);
$jobs_applied = R::find('applied', 'cat = ? AND user_id = ?', ['job', $_SESSION["user"]["id"]]);

$folios_posted = R::find('post', 'cat = ? AND user_id = ?', ['folio', $_SESSION["user"]["id"]]);
$folios_hidden = R::find('hidden', 'cat = ? AND user_id = ?', ['folio', $_SESSION["user"]["id"]]);
$folios_liked = R::find('liked', 'cat = ? AND user_id = ?', ['folio', $_SESSION["user"]["id"]]);
$folios_applied = R::find('applied', 'cat = ? AND user_id = ?', ['folio', $_SESSION["user"]["id"]]);

?>

<div class="stat-wrap">
	<div class="stat-topic">JOBS:</div>
	<a class="stat" href="/post-job.php">POSTED: <span><? echo count($jobs_posted); ?></span></a>
	<a class="stat" href="/?filter=hidden&">HIDDEN: <span><? echo count($jobs_hidden); ?></span></a>
	<a class="stat" href="/?filter=liked&">LIKED: <span><? echo count($jobs_liked); ?></span></a>
	<a class="stat" href="/?filter=applied&">APPLIED: <span><? echo count($jobs_applied); ?></span></a>
	<br>
	<br>
	<div class="stat-topic">PORTFOLIOS:</div>
	<a class="stat" href="/post-portfolio.php">POSTED: <span><? echo count($folios_posted); ?></span></a>
	<a class="stat" href="/portfolios.php?filter=hidden&">HIDDEN: <span><? echo count($folios_hidden); ?></span></a>
	<a class="stat" href="/portfolios.php?filter=liked&">LIKED: <span><? echo count($folios_liked); ?></span></a>
	<a class="stat" href="/portfolios.php?filter=applied&">APPLIED: <span><? echo count($folios_applied); ?></span></a>
</div>



<?
 require_once "footer.php";
?>

<script>
	$('.search-icon').addClass('op0').css({'cursor':'default'});
</script>