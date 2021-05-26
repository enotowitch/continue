<script>
	var search_tag = /[^?]*$/.exec(window.location)[0];
</script>

<? var_dump($_GET); ?>
<? if(isset($_GET)): ?>
	<script>


		$(`.card:contains(${search_tag})`).each(function(){
			$(this).find('.tag').each(function(){
				var tag_text = $(this).text().trim();
				if(tag_text == search_tag){
					$(this).addClass('searched');
				}
			});
		});

		$('.card').not('.form-card').not('.card2').hide();
		$('.searched').closest('.card').show();

		$(`.tag:contains(${search_tag})`).each(function(){
			var tag_text = $(this).text().trim();
			if(tag_text == search_tag){
					$(this).addClass('tag_active');
				}			
		});

		my_alert('brand-del', `Cancel Search: ${search_tag}`);
		$('.please-log').addClass('cancel-search').css({"text-decoration": "underline"});

		$('.cancel-search').on('click', function(){

		var without_search_tag = window.location.href.replace(/\?.*/,'');
		window.location.href = without_search_tag;

		})

	</script>
<? endif; ?>

<? if(!$_GET): ?>
	<script>
		$('.card').show();
		$('.please-log').detach();
	</script>
<? endif; ?>