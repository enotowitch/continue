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
	<input type="submit" value="SIGN <? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "UP";}else{echo "IN";}?>">
</div>
	<p><? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "Already";}else{echo "Don't";}?> have account? - <a href="<? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "login.php";}else{echo "reg.php";}?>">SIGN <? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "IN";}else{echo "UP";}?></a></p>
</form>