<div class="search bg">
	<div class="search__body">
		<div class="search-topics-flex">
			<div class="search__topics">
				<div class="search__topic search-topic-design search__topic_active"><span>DESIGN</span></div>
				<div class="search__topic search-topic-dev"><span>DEV</span></div>
				<div class="search__topic search-topic-videoAudio"><span>VIDEO & AUDIO</span></div>
				<div class="search__topic search-topic-marketing"><span>MARKETING</span></div>
				<div class="search__topic search-topic-writing"><span>WRITING</span></div>
				<div class="search__topic search-topic-platformsSoft"><span>PLATFORMS & SOFT</span></div>
				<div class="search__topic search-topic-other"><span>OTHER</span></div>
			</div>
			<img class="cross cross_search" src="img/icons/cross.svg" alt="cross">
		</div>
			<div class="select-tags-div"></div>
			<!-- ! TAGS -->
			<div class="search__tags-wrap">
				<div class="search__tags search__tags_active load_design"></div>
				<div class="search__tags load_dev"></div>
				<div class="search__tags load_videoAudio"></div>
				<div class="search__tags load_marketing"></div>
				<div class="search__tags load_writing"></div>
				<div class="search__tags load_platformsSoft"></div>
				<div class="search__tags load_other"></div>
			</div>
		</div>
		<?
		include_once "filters.php";
?>
	</div>



	<!-- ! load tags -->
	<script>
		$('.search__tags').prepend('<div class="hidden-tag">123</div>');
		$.post({
			url: 'tags-list.php',
		dataType: 'json',
		success: function (data) {
			data.design.forEach(element => {
				$('.load_design').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => { $('.optgroup-design').append(`<option value="${element}">${element}</option>`); }, 100);
			});
			data.dev.forEach(element => {
			$('.load_dev').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => {$('.optgroup-dev').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.videoAudio.forEach(element => {
			$('.load_videoAudio').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => {$('.optgroup-video').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.marketing.forEach(element => {
			$('.load_marketing').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => {$('.optgroup-marketing').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.writing.forEach(element => {
			$('.load_writing').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => {$('.optgroup-writing').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.platformsSoft.forEach(element => {
			$('.load_platformsSoft').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => {$('.optgroup-platforms').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			data.other.forEach(element => {
			$('.load_other').append(`<div class="search__tag tag">${element}</div>`);
				setTimeout(() => {$('.optgroup-other').append(`<option value="${element}">${element}</option>`);}, 100);
			});
			// change TOPIC on load depending on TAG
			setTimeout(() => {
				var val = $('[name="tags"]').val();
				
				data.dev.forEach(element => {if(val == element){$('.search-topic-dev').trigger('click');}});
				data.videoAudio.forEach(element => {if(val == element){$('.search-topic-videoAudio').trigger('click');}});
				data.marketing.forEach(element => {if(val == element){$('.search-topic-marketing').trigger('click');}});
				data.writing.forEach(element => {if(val == element){$('.search-topic-writing').trigger('click');}});
				data.platformsSoft.forEach(element => {if(val == element){$('.search-topic-platformsSoft').trigger('click');}});
				data.other.forEach(element => {if(val == element){$('.search-topic-other').trigger('click');}});
			}, 500);
		}
	}).done(function () {
			$.get("info-select-tags.php", function (data) {
				$('.select-tags-div').prepend(data);
				$('.search').find('.tags__select').addClass('search-tags-list').removeClass('tags__select').attr('multiple', false).attr('title', 'Search tag').attr('data-placeholder', 'Search tag');
				$('.search-tags-list').find('option:contains("0")').text('Search Tag');
			});
	});
	</script>