<select class="tags__select" name="tags[]" title="Choose 3 tags" data-placeholder="Choose 3 tags..." multiple>
					<optgroup label="DESIGN">
					<option style="display: none;" value="0">0</option>
						<!-- <option value="animation">animation</option>
						<option value="anime">anime</option>
						<option value="art">art</option>
						<option value="brand">brand</option>
						<option value="CAD">CAD</option>
						<option value="cartoonist">cartoonist</option>
						<option value="character">character</option>
						<option value="childrens">childrens</option>
						<option value="comic">comic</option>
						<option value="creative">creative</option>
						<option value="design">design</option>
						<option value="direction">direction</option>
						<option value="editorial">editorial</option>
						<option value="fashion">fashion</option>
						<option value="graphic">graphic</option>
						<option value="illustration">illustration</option>
						<option value="img edit">img edit</option>
						<option value="layout">layout</option>
						<option value="motion">motion</option>
						<option value="photo">photo</option>
						<option value="presentation">presentation</option>
						<option value="realistic">realistic</option>
						<option value="social">social</option>
						<option value="storyboard">storyboard</option>
						<option value="UX / UI">UX / UI</option>
						<option value="video">video</option>
						<option value="VR / AR">VR / AR</option> -->
					</optgroup>
					<optgroup label="DEV">
						<!-- <option value="QA">QA</option>
						<option value="CMS">CMS</option>
						<option value="database">database</option>
						<option value="desktop">desktop</option>
						<option value="ecommerce">ecommerce</option>
						<option value="full stack">full stack</option>
						<option value="game dev">game dev</option>
						<option value="mobile">mobile</option>
						<option value="product">product</option>
						<option value="management">management</option>
						<option value="prototype">prototype</option>
						<option value="software">software</option>
						<option value="research">research</option>
						<option value="front-end">front-end</option>
						<option value="back-end">back-end</option> -->
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