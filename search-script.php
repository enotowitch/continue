<input type="hidden" name="search_tag" value="<? echo $_GET["search-tag"]; ?>">
<input type="hidden" name="search_word" value="<? echo $_GET["search-word"]; ?>">

<? if(isset($_GET)): ?>

<script>
my_alert('brand-del', 'Cancel all search filters');
$('.please-log').addClass('cancel_all_filters').css({"text-decoration": "underline"});
$('.cancel_all_filters').on('click', function(){
	var cancel_all_filters = window.location.href.split('/').pop();
	var cancel_all_filters = window.location.href.replace(`${cancel_all_filters}`,'');
	window.location.href = cancel_all_filters;
})
</script>

<? endif; ?>

<? var_dump($_GET); ?>
<? if(isset($_GET["search-tag"])): ?>
	<script>

	var search_tag = $('[name="search_tag"]').val().replaceAll('?','');

	// var search_tag = /[^?]*$/.exec(window.location)[0].replace('&search=','');
	

		$(`.card:contains(${search_tag})`).each(function(){
			$(this).find('.tag').each(function(){
				var tag_text = $(this).text().trim();
				if(tag_text == search_tag){
					$(this).addClass('searched');
				}
			});
		});

		$('.card').not('.form-card').not('.card2').hide();
		$('.db-hidden').addClass('dn');

		$('.searched').closest('.card').show();

		$(`.tag:contains(${search_tag})`).each(function(){
			var tag_text = $(this).text().trim();
			if(tag_text == search_tag){
					$(this).addClass('tag_active');
				}			
		});


		$('.tags__select2').after('<div class="cancel-filter cancel_filter"><? echo $_GET["search-tag"]; ?><span class="close-cancel-filter close_cancel_filter_tag"></span></div>');



	</script>
<? endif; ?>



<!-- ! search-word -->
<? if(isset($_GET["search-word"])): ?>

<script>

var search_word = $('[name="search_word"]').val().replaceAll('?','').toLowerCase();

$('.card').hide();
$(`.card:contains(${search_word})`).show();


$('.search-word').after('<div class="cancel-filter cancel_filter"><? echo $_GET["search-word"]; ?><span class="close-cancel-filter close_cancel_filter_word"></span></div>');


</script>

<? endif; ?>
<!-- ? search-word -->



<script>
// ! remove searched word from url
$('.close_cancel_filter_word').on('click', function(){
	var searched_word = encodeURI($(this).closest('div').text().trim());	
	var without_search = window.location.href.replace(`search-word=${searched_word}&`, '');
	window.location.href = without_search;
})
// ! remove searched tag from url
$('.close_cancel_filter_tag').on('click', function(){
	var searched_word = encodeURI($(this).closest('div').text().trim());	
	var without_search = window.location.href.replace(`search-tag=${searched_word}&`, '');
	window.location.href = without_search;
})

</script>



<? if(!$_GET): ?>
	<script>
		$('.card').show();
		$('.please-log').detach();
	</script>
<? endif; ?>