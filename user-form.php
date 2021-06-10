<form class="user-form">
<!-- ! log-as -->
<? 
	require_once "log-as.php"
?>
<!-- ? log-as -->
<div class="inputs">
<input name="user_form_from" type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>">
	<label>
		<p>User Email</p>
		<input name="user_mail" type="text">
	</label>
	<label>
		<p>Password</p>
		<input name="user_pass" type="password">
	</label>
	<input class="sign-in" type="submit" value="SIGN <? if_page('/reg.php', "UP", "IN"); ?>">
</div>
	<p><? if_page('/reg.php', "Already", "Don't"); ?> have account? - <a href="<? if_page('/reg.php', "login.php", "reg.php"); ?>">SIGN <? if_page('/reg.php', "IN", "UP"); ?></a></p>
</form>