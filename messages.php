<?
	session_start();
	require_once "header.php";
	require_once "DB.php";


	$my_msg = R::find('message', 'user_to_id = ?', [$_SESSION['user']['id']], 'ORDER BY id DESC');
	
?>

<? 
	require_once "log-as.php"; 
?>

<? 
	foreach($my_msg as $my_msg): 
		// ! 0 msgs
	$yet_shown_msg[] = ""; 
	
?>

	<? if(in_array($my_msg['user_from_id'], $yet_shown_msg)){
		continue;
	} ?>

<a href="mes.php?from=<? echo $my_msg->user_from_id; ?>">

<!-- ! msg -->
<? require "msg.php"; ?>
<!-- ? msg -->

</a>




<!-- // ! 1,2,3 and more msgs... -->
<? $yet_shown_msg[] = $my_msg['user_from_id']; ?>


<? endforeach; ?>



<?
 require_once "footer.php";
?>