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
	
	// ! fill the form before POST again
	$('.filter-form').find('.search-workload').val('<? echo $_GET["workload"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>



<!-- ! posted -->
<? if ($_GET["posted"]): ?>
<script>

$(document).ready(function(){
	
	// ! fill the form before POST again
	$('.filter-form').find('.search-posted').val('<? echo $_GET["posted"]; ?>');
	// ! post again
	setTimeout(() => {
		post_filter_card();	
	}, 500);
	
})

</script>
<? endif; ?>