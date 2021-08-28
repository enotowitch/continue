<!-- all -->
<? if ($_GET): ?>
	<script>
	$(document).ready(function(){
		$('.search').show();
		$('.banner').hide();
		$('.post').hide();
		$('.load-more').detach();
		$('.search__body').append('<div class="search-loader-top"></div>');
		// skeleton
		$('.card').not('.not100').html('<div class="sk__card"><div class="sk__logo sk-anim"></div><div class="sk__title sk-anim"></div><div class="sk__title2 sk-anim"></div><div class="sk__infos"><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div></div><div class="sk__infos2"><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div></div></div>');
<? if($_GET["filter"]): ?>
	$('.filter-form').find('.filter').find(`option:contains("<? echo $_GET["filter"]; ?>")`).attr('selected', true);
<? endif; ?> 
<? if($_GET["search-tag"]): ?>
	$('.filter-form').find('[name="tags"]').append('<option value="<? echo $_GET["search-tag"]; ?>"><? echo $_GET["search-tag"]; ?></option>');
<? endif; ?> 
<? if($_GET["search-word"]): ?>
	$('.filter-form').find('.search-word').prepend('<option selected value="<? echo $_GET["search-word"]; ?>"><? echo $_GET["search-word"]; ?></option>');
<? endif; ?> 
<? if($_GET["search-company"]): ?>
	$('.filter-form').find('.search-company').prepend('<option selected value="<? echo $_GET["search-company"]; ?>"><? echo $_GET["search-company"]; ?></option>');
<? endif; ?> 
<? if($_GET["salary"]): ?>
	$('.filter-form').find('.search-salary').val('<? echo $_GET["salary"]; ?>');
<? endif; ?> 
<? if($_GET["experience"]): ?>
	$('.filter-form').find('.search-experience').val('<? echo $_GET["experience"]; ?>');
<? endif; ?> 
<? if($_GET["duration"]): ?>
	$('.filter-form').find('.search-duration').val('<? echo $_GET["duration"]; ?>');
<? endif; ?> 
<? if($_GET["location"]): ?>
	$('.filter-form').find('.search-location').val('<? echo $_GET["location"]; ?>');
<? endif; ?> 
<? if($_GET["workload"]): ?>
	$('.filter-form').find('.search-workload').val('<? echo $_GET["workload"]; ?>');
<? endif; ?> 
<? if($_GET["posted"]): ?>
	$('.filter-form').find('.search-posted').val('<? echo $_GET["posted"]; ?>');
<? endif; ?> 
<? if($_GET["quantity"]): ?>
	$('.filter-form').find('[name="quantity"]').val('<? echo $_GET["quantity"]; ?>');
<? endif; ?> 
// ! post again
setTimeout(() => {
	post_filter_card();	
}, 100);
// update chosen
$('.sort-flex').find('select').each(function(){
	$(this).trigger("chosen:updated");
	if($(this).val() != null){
		$(this).next('.chosen-container').find('.chosen-single span').css({ 'color': '#6fda44', 'font-weight': '700' });
	}
});
	});
	</script>
<? endif; ?>