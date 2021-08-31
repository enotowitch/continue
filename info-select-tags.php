<select class="tags__select" name="tags[]" title="Choose 3 tags" data-placeholder="Choose 3 tags..." multiple>
					<optgroup class="optgroup-design" label="DESIGN">
					<option style="display: none;" value="0">0</option>
					</optgroup>
					<optgroup class="optgroup-dev" label="DEV">
					</optgroup>
					<optgroup class="optgroup-video" label="VIDEO & AUDIO">
					</optgroup>
					<optgroup class="optgroup-marketing" label="MARKETING">
					</optgroup>
					<optgroup class="optgroup-writing" label="WRITING">
					</optgroup>
					<optgroup class="optgroup-platforms" label="PLATFORMS & SOFT">
					</optgroup>
					<optgroup class="optgroup-other" label="OTHER">
					</optgroup>
				</select>


<? if($_SERVER['PHP_SELF'] == '/update-form.php'): ?>
	<script>
		$.post({
			url: 'tags-list.php',
			dataType: 'json',
			success: function(data){
			data.design.forEach(element => {	setTimeout(() => { $('.optgroup-design').append(`<option value="${element}">${element}</option>`); }, 100);
			});
			data.dev.forEach(element => {	setTimeout(() => {$('.optgroup-dev').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.videoAudio.forEach(element => {	setTimeout(() => {$('.optgroup-video').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.marketing.forEach(element => {	setTimeout(() => {$('.optgroup-marketing').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.writing.forEach(element => {	setTimeout(() => {$('.optgroup-writing').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.platformsSoft.forEach(element => {	setTimeout(() => {$('.optgroup-platforms').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.other.forEach(element => {	setTimeout(() => {$('.optgroup-other').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			setTimeout(() => {
				$('.tags__select').trigger("chosen:updated");
			}, 100);
			}
		})
	</script>
<? endif; ?>