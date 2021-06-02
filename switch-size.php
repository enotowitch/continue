<select class="switch-size">
<option value="change size">change size</option>
<option value="w_small">small</option>
<option value="w100">big</option>
</select>

<div class="filter-div">
	<select class="filter">
	<option value="filter">filter</option>
	<option value="liked">liked</option>
	<option value="hidden">hidden</option>
	<option value="messaged">messaged</option>
	</select>
</div>

<div class="search-select">
<? 
include_once "tags-select.php";
?>
</div>

<div class="search-word-div">
	<input class="search-word" type="text" placeholder="search word">
</div>



<script>

	$('.search-select').find('.tags__select').addClass('tags__select2').removeClass('tags__select');
	$('.tags__select2').attr('multiple', false);
	$('.tags__select2 option:selected').text('search tag');

	
</script>