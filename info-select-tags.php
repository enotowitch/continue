<select class="tags__select" name="tags[]" title="Choose 3 tags" data-placeholder="Choose 3 tags..." multiple>
					<optgroup label="DESIGN">
					<option style="display: none;" value="0">0</option>
					</optgroup>
					<optgroup label="DEV">
					</optgroup>
					<optgroup label="VIDEO & AUDIO">
					</optgroup>
					<optgroup label="MARKETING">
					</optgroup>
					<optgroup label="WRITING">
					</optgroup>
					<optgroup label="PLATFORMS & SOFT">
					</optgroup>
					<optgroup label="OTHER">
					</optgroup>
				</select>


<!-- ! load tags -->
<script>
	$.post({
		url: 'tags-list.php',
		dataType: 'json',
		success: function(data){
			data.design.forEach(element => {
				$('[label="DESIGN"]').append(`<option value="${element}">${element}</option>`);
			});
			data.dev.forEach(element => {
				$('[label="DEV"]').append(`<option value="${element}">${element}</option>`);
			});
			data.videoAudio.forEach(element => {
				$('[label="VIDEO & AUDIO"]').append(`<option value="${element}">${element}</option>`);
			});
			data.marketing.forEach(element => {
				$('[label="MARKETING"]').append(`<option value="${element}">${element}</option>`);
			});
			data.writing.forEach(element => {
				$('[label="WRITING"]').append(`<option value="${element}">${element}</option>`);
			});
			data.platformsSoft.forEach(element => {
				$('[label="PLATFORMS & SOFT"]').append(`<option value="${element}">${element}</option>`);
			});
			data.other.forEach(element => {
				$('[label="OTHER"]').append(`<option value="${element}">${element}</option>`);
			});
			
		}
	})
</script>