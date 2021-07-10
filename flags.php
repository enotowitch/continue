<script>
	$(document).ready(function(){
		$('.info__simple.location').each(function(){
		var text = $(this).text().trim().toLowerCase();
		$(this).prepend(`<img src="img/icons/flags/${text}.png">`);
	})
	})
</script>