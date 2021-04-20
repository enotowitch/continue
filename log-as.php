<? if($_SESSION["user"] != NULL): ?>
	<div class="log-as">
	<div>You logged as: <span><? echo $_SESSION["user"]["mail"]; ?></span></div>
		<a class="out" href="logout.php">LOG OUT</a>
	</div>
<? endif; ?>