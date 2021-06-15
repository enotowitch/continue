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



<!-- ! log-as -->
<? include "log-as.php"; ?>
<!-- ? log-as -->

<?
	include "change-page.php";
?>
<?
	include "change-page.php";
?>




<div class="card-flex">
	
<!-- ! sort-applies -->
<div class="sort-applies-div">
	Applications for:
	<select class="sort-applies">
	<option value="">All</option>
	</select>
</div>




<? 
if($_SERVER["PHP_SELF"] == '/messages.php'){
	$destination = 'post';
}
if($_SERVER["PHP_SELF"] == '/messages-folios.php'){
	$destination = 'portfolio';
}
?>


<? foreach($my_msg as $my_msg): 
	// var_dump($my_msg['applied_to_cat']);
	$post = R::find($destination, 'id = ?', [$my_msg["apply_id"]]);
?>



	<? foreach($post as $post): ?>


		<div class="card card_main w100 <? echo $_COOKIE['size']; ?>">

		<!-- ! applied_to_card -->
		<?  
		if($_SERVER["PHP_SELF"] == '/messages.php'){
			$show_applied = 'portfolio';
		}
		if($_SERVER["PHP_SELF"] == '/messages-folios.php'){
			$show_applied = 'post';
		}
			$applied_to_card = R::find($show_applied, 'id = ?', [$my_msg["applied_to_card"]]);
		?>

		<? foreach($applied_to_card as $applied_to_card): ?>
		<div hidden class="applied_to_card"><? echo $applied_to_card['title']; ?></div>

		<? endforeach; ?>
		<!-- ? applied_to_card -->

		<!-- ! user_from_id -->
		<input class="user_from_id" type="hidden" value="<? echo $my_msg->user_from_id; ?>">

		<? 
			include "card-content.php";
		?>
		</div>

	<? endforeach; ?>

<? endforeach; ?>


</div>


<?
 require_once "footer.php";
?>


<script>

$('.apply').addClass('mes-to-applicant').removeClass('get-mes-form').attr('src', 'img/icons/email.svg');

$('.mes-to-applicant').on('click', function(){
	var user_from_id = $(this).closest('.card').find('.user_from_id').val();	
	window.location.href = `/mes.php?from=${user_from_id}`;
})

setTimeout(() => {
	$('.db-messaged').removeClass('dn');
	$('.info__pics').slick('refresh');
}, 300);


$('.applied_to_card').each(function(){
	
	var options = $(this).text().trim();
	
	$('.sort-applies').append($('<option>', {
    value: options,
    text: `${options}`
}));
});	

// remove duplicate options
var usedNames = {};
$(".sort-applies > option").each(function () {
    if(usedNames[this.text]) {
        $(this).remove();
    } else {
        usedNames[this.text] = this.value;
    }
});

$('.sort-applies').on('change', function(){
	var val = $(this).val();
	$('.card').hide();
	$(`.card:contains("${val}")`).show();
})
</script>