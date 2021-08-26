<div class="search bg">
	<div class="search__body">
		<div class="search-topics-flex">
			<div class="search__topics">
				<div class="search__topic search__topic_active"><span>DESIGN</span></div>
				<div class="search__topic"><span>DEV</span></div>
				<div class="search__topic"><span>VIDEO & AUDIO</span></div>
				<div class="search__topic"><span>MARKETING</span></div>
				<div class="search__topic"><span>WRITING</span></div>
				<div class="search__topic"><span>PLATFORMS & SOFT</span></div>
				<div class="search__topic"><span>OTHER</span></div>
			</div>
			<img class="cross cross_search" src="img/icons/cross.svg" alt="cross">
		</div>
		<div class="select-tags-div"></div>
			<!-- ! TAGS -->
			<div class="search__tags search__tags_active load_design"></div>
			<div class="search__tags load_dev"></div>
			<div class="search__tags load_videoAudio"></div>
			<div class="search__tags load_marketing"></div>
			<div class="search__tags load_writing"></div>
			<div class="search__tags load_platformsSoft"></div>
			<div class="search__tags load_other"></div>
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
			});
			data.dev.forEach(element => {
			$('.load_dev').append(`<div class="search__tag tag">${element}</div>`);
			});
			data.videoAudio.forEach(element => {
			$('.load_videoAudio').append(`<div class="search__tag tag">${element}</div>`);
			});
			data.marketing.forEach(element => {
			$('.load_marketing').append(`<div class="search__tag tag">${element}</div>`);
			});
			data.writing.forEach(element => {
			$('.load_writing').append(`<div class="search__tag tag">${element}</div>`);
			});
			data.platformsSoft.forEach(element => {
			$('.load_platformsSoft').append(`<div class="search__tag tag">${element}</div>`);
			});
			data.other.forEach(element => {
			$('.load_other').append(`<div class="search__tag tag">${element}</div>`);
			});
		}
	}).done(function () {
			$.get("info-select-tags.php", function (data) {
				$('.select-tags-div').prepend(data);
				$('.search').find('.tags__select').addClass('search-tags-list').removeClass('tags__select').attr('multiple', false).attr('title', 'Search tag').attr('data-placeholder', 'Search tag');
				$('.search-tags-list').find('option:contains("0")').text('Search Tag');
			});
	});
	</script>