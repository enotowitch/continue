<?
	session_start();
	require_once "header.php";
	require_once "DB.php";

	// todo
	$my_msg = R::find('message', 'user_to_id = ?', [$_SESSION['user']['id']], 'ORDER BY id DESC');
	
?>

<!-- ! no user -->
<? include "no-user.php"; ?>
<!-- ? no user -->



<!-- ! your -->
<? include "your.php"; ?>
<!-- ? your -->

<div class="mes-wrap">
	<div class="mes-inner">

	<? 
		foreach($my_msg as $my_msg): 
			// ! 0 msgs
			// todo
		$yet_shown_msg[] = ""; 
		
	?>
	
		<? if(in_array($my_msg['user_from_id'], $yet_shown_msg)){
			continue;
		} ?>
	
	<a href="mes.php?from=<? echo $my_msg->user_from_id; ?>">
	
	<!-- ! msg -->
	<? include "msg.php"; ?>
	<!-- ? msg -->
	
	</a>
	
	
	
	
	<!-- // ! 1,2,3 and more msgs... -->
	<? $yet_shown_msg[] = $my_msg['user_from_id']; ?>
	
	
	<? endforeach; ?>
	</div>
</div>

<?
 require_once "footer.php";
?>