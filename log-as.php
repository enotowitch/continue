<? if($_SESSION["user"] != NULL): ?>

<div class="log-as">
	<div class="img-mail">
		<img class="log-as-img" src="<? echo $_SESSION["user"]["logo"]; ?>">
		<div class="log-as-mail"><? echo $_SESSION["user"]["mail"]; ?></div>
	</div>
	<div class="profile-actions">
		<div class="stat brand">Change logo</div>
		<a class="out stat" href="logout.php">LOG OUT</a>
		<? if($_SERVER['PHP_SELF'] == '/profile.php'): ?>
		<div class="danger-profile-action stat">Change password</div>
		<div class="danger-profile-action stat">Delete account</div>
		<? endif; ?>
	</div>
</div>

<? endif; ?>