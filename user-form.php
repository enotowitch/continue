<form class="user-form">
	<div class="log-as">
	<div>You logged as: <span><? echo $_SESSION["user"]["mail"]; ?></span></div>
		<a class="out" href="logout.php">LOG OUT</a>
	</div>
<input name="user_form_from" type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>">
	<label>
		User Email
		<input name="user_mail" type="text">
	</label>
	<label>
		Password
		<input name="user_pass" type="password">
	</label>
	<input type="submit" value="SIGN <? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "UP";}else{echo "IN";}?>">
	<p><? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "Already";}else{echo "Don't";}?> have account? - <a href="<? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "login.php";}else{echo "reg.php";}?>">SIGN <? if($_SERVER['PHP_SELF'] == '/reg.php'){echo "IN";}else{echo "UP";}?></a></p>
</form>