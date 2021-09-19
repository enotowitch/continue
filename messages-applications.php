<?
	session_start();
	require_once "header.php";
	require_once "DB.php";
	require_once "search.php";
	require_once "functions.php";
?>

<!-- ! no user -->
<? include "no-user.php"; ?>
<!-- ? no user -->





<?
	include "change-page.php";
?>
<?
	include "change-page.php";
?>

<!-- ! sort-applies -->
<div class="sort-applies-div">
	Applications for <? if($_SERVER["PHP_SELF"] == '/messages.php'){echo 'portfolio:';} else{echo 'job:';} ?>
	<select class="sort-applies">
	<option value="">All</option>
	</select>
</div>


<div class="card-flex">

<div style="width: 100%">
<div class="show-hidden-posts">Show hidden posts</div>
<div class="show-applied-posts">Show applied posts</div>
</div>

<?
	// ! $post = applications to me 
	// ! $my_msg_applied_to_card = my cards (titles) to which I got applies
	$posts_and_applied_to_card = load_applications();

	$post = $posts_and_applied_to_card[0];
	$my_msg_applied_to_card = $posts_and_applied_to_card[1];

	// ! append IDs/titles to select "Applications for (job/folio)"
	$options = R::loadAll('post', $my_msg_applied_to_card);
	?>

	<? foreach($options as $option): ?>
	<script>
		$('.sort-applies').append('<option value="<? echo $option["id"]; ?>"><? echo $option["title"]; ?></option>');
	</script>
	<? endforeach; ?>



	<? foreach($post as $post): ?>


		<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">

		<? 
			include "card-content.php";
		?>
		</div>

	<? endforeach; ?>


</div>

<span hidden class="go-to-first">go to first</span>


<?
 require_once "footer.php";
?>


<script>

render_mes_to_applicant();


// ! ready
$(document).ready(function(){
	setTimeout(() => {
		$('.db-messaged').removeClass('dn');
		$('.db-hidden').removeClass('dn');
		$('.info__pics').slick('refresh');
	}, 300);
})
</script>