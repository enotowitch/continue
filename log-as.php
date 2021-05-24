<? if($_SESSION["user"] != NULL): ?>

<div class="log-as">
	<div class="img-mail">
		<img class="log-as-img" src="<? echo $_SESSION["user"]["logo"]; ?>">
		<div class="log-as-mail"><? echo $_SESSION["user"]["mail"]; ?></div>
	</div>
	<a class="out" href="logout.php">LOG OUT</a>
</div>

<? endif; ?>