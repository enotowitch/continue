<!-- all -->
<? if ($_GET): ?>
	<script>
	$(document).ready(function(){
		$('.search-icon').trigger('click');
	});
	</script>
<? endif; ?>



<!-- ! filter -->
<? if ($_GET["filter"]): ?>
<script>

	$(document).ready(function(){
		// ! render
	$('.search-result').append('<div class="cancel-filter cancel_filter_filter"><? echo $_GET["filter"]; ?><span class="close-cancel-filter close_filter"></span></div>');
	// ! fill the form before POST again
	$('.filter-form').find('.filter').find(`option:contains("<? echo $_GET["filter"]; ?>")`).attr('selected', true);
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
	})
	
</script>
<? endif; ?>



<!-- ! search-tag -->
<? if ($_GET["search-tag"]): ?>
<script>

$(document).ready(function(){
	// ! render 1
	$('.tag').removeClass('tag_active');
	$('.tag:contains("<? echo $_GET["search-tag"]; ?>")').addClass('tag_active');
	// ! render 2
	$('.search-result').append('<div class="cancel-filter cancel_filter_tag"><? echo $_GET["search-tag"]; ?><span class="close-cancel-filter close_cancel_filter_tag"></span></div>');
	// ! fill the form before POST again
	$('.filter-form').find('[name="tags"]').append('<option value="<? echo $_GET["search-tag"]; ?>"><? echo $_GET["search-tag"]; ?></option>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})
	

</script>
<? endif; ?>



<!-- ! search-word -->
<? if ($_GET["search-word"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_word"><span class="gray">Title:&nbsp</span><div><? echo $_GET["search-word"]; ?></div><span class="close-cancel-filter close_cancel_filter_word"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-word').val('<? echo $_GET["search-word"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>



<!-- ! search-company -->
<? if ($_GET["search-company"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_company"><span class="gray">Company:&nbsp</span><div><? echo $_GET["search-company"]; ?></div><span class="close-cancel-filter close_cancel_filter_company"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-company').val('<? echo $_GET["search-company"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>



<!-- ! salary -->
<? if ($_GET["salary"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_salary"><span class="gray">Salary:&nbsp</span><div><? echo $_GET["salary"]; ?></div><span class="close-cancel-filter close_cancel_filter_salary"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-salary').val('<? echo $_GET["salary"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>


<!-- ! experience -->
<? if ($_GET["experience"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_experience"><span class="gray">Experience:&nbsp</span><div><? echo $_GET["experience"]; ?></div><span class="close-cancel-filter close_cancel_filter_experience"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-experience').val('<? echo $_GET["experience"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>



<!-- ! duration -->
<? if ($_GET["duration"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_duration"><span class="gray">Duration:&nbsp</span><div><? echo $_GET["duration"]; ?></div><span class="close-cancel-filter close_cancel_filter_duration"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-duration').val('<? echo $_GET["duration"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>



<!-- ! location -->
<? if ($_GET["location"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_location"><span class="gray">Location:&nbsp</span><div><? echo $_GET["location"]; ?></div><span class="close-cancel-filter close_cancel_filter_location"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-location').val('<? echo $_GET["location"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>



<!-- ! workload -->
<? if ($_GET["workload"]): ?>
<script>

$(document).ready(function(){
	// ! render
	$('.search-result').append(`<div class="cancel-filter cancel_filter_workload"><span class="gray">Workload:&nbsp</span><div><? echo $_GET["workload"]; ?></div><span class="close-cancel-filter close_cancel_filter_workload"></span></div>`);
	// ! fill the form before POST again
	$('.filter-form').find('.search-workload').val('<? echo $_GET["workload"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>