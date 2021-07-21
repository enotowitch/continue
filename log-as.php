<? if($_SESSION["user"] != NULL): ?>

<div class="log-as">
	<div class="img-mail">
		<img class="log-as-img" src="<? echo $_SESSION['user']['logo']; ?>">
		<div class="log-as-img-upd-div">
			<img class="log-as-img-upd" src="img/icons/update.svg" alt="update-logo">
		</div>
		<div class="log-as-mail">
			<? echo $_SESSION["user"]["mail"]; ?>
		</div>
	</div>
	<div class="profile-actions">
		<a class="out stat" href="logout.php">LOG OUT</a>
		<? if($_SERVER['PHP_SELF'] == '/profile.php'): ?>
		<div class="danger-profile-action change_pass stat">Change password</div>
		<div class="danger-profile-action del_account stat">Delete account</div>
		<? endif; ?>
	</div>
</div>

<? endif; ?>