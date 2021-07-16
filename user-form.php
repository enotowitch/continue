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
	<? if($_SERVER['PHP_SELF'] == '/login.php'): ?>
	<label>
		<p>Password</p>
		<input name="user_pass" type="password">
	</label>
	<? endif; ?>
	<? if($_SERVER['PHP_SELF'] == '/reg.php'): ?>
		<div>*<b>email</b> for <b>password</b> </div>
		<div class="reg-role">Your role</div>
		<div class="stat_radio m0a">
		<input type="radio" id="role"
   	  name="role" value="hirer">
   	 <label for="role">I hire people</label>
		 </div>
		 <div class="stat_radio m0a">
		<input type="radio" id="role2"
   	  name="role" value="maker">
   	 <label for="role2">Creator (artist, dev...)</label>
		 </div>
	<? endif; ?>
	<input class="sign-in" type="submit" value="SIGN <? if_page('/reg.php', "UP", "IN"); ?>">
</div>
	<p><? if_page('/reg.php', "Already", "Don't"); ?> have account? - <a href="<? if_page('/reg.php', "login.php", "reg.php"); ?>">SIGN <? if_page('/reg.php', "IN", "UP"); ?></a></p>
	<? if($_SERVER['PHP_SELF'] == '/login.php'): ?>
		<div class="forgot-pass">Forgot Password?</div>
	<? endif; ?>
</form>