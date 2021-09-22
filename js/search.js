$(document).ready(function () {

	colorInfo = Array();

	// ! TAG
	$(document).on('click', '.tag', function () {

		if (card_from == '/mes.php') { return; }

		prepareColorInfo();

		dont_load_more();

		$('.tag').removeClass('empty-tag');
		var text = $(this).text().trim();

		$('.search-tags-list').val(`${text}`);
		$('.search-tags-list').trigger('chosen:updated');
		$('.search-tags-list').trigger('change');

		// pass tag to hidden select in .filter-form
		$('.filter-form').find('select[name="tags"]').html(`<option value="${text}">${text}</option>`);

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-tag.*?&/, '').replace(/quantity.*?&/, '');
			history.pushState(null, '', `?${last_filter}search-tag=${text}&`);
		} else {
			history.pushState(null, '', `?search-tag=${text}&`);
		}
		// ! post
		$('[name="quantity"]').val(0)
		post_filter_card(colorInfo);

	})

	// ! SEARCH-WORD, SEARCH-COMPANY

	// ! POSTED, WORKLOAD, LOCATION, DURATION, EXPERIENCE, SALARY, FILTER
	$(document).on('change', '.search-posted, .search-workload, .search-location, .search-duration, .search-experience, .search-salary, .filter, .search-word, .search-company', function (e) {

		// ! colorInfo "manually"
		var color_class = this.className.replace('search-', '');
		$('.info').find(`#${color_class}`).addClass('brand');

		prepareColorInfo();
		
		dont_load_more();

		if(this.className == 'search-word' || this.className == 'search-company'){
			var className = this.className;
		} else {
			var className = this.className.replace('search-', '');
		}
		var text = $(this).val();

		last_filter(text, className);
		// ! post
		$('[name="quantity"]').val(0)
		post_filter_card(colorInfo);
	})


	// ? REMOVE


	// ? remove TAG
	$(document).on('click', '.close_cancel_filter_tag', function () {
		// ! NULL select/input
		$('.filter-form').find('select[name="tags"]').val('');

		// ! push URL
		var searched_word = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`search-tag=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender 1
		$('.tag').removeClass('tag_active');
		// ! unrender 2
		$('.search-result').find('.cancel_filter_tag').detach();
		// ! unrender 3
		$('.search-tags-list').val('0');
		$('.search-tags-list').trigger("chosen:updated");
		// ! unrender 4
		$('.search__tag').removeClass('empty-tag');
		// ! post again
		$('[name="quantity"]').val(0)
		post_filter_card();
	})

	// ? remove FILTER
	$(document).on('click', '.close_filter', function () {

		// ! NULL select/input
		$('.filter-form').find('select.filter').val("");

		// ! push URL
		var searched_word = $(this).closest('div').text().trim();
		var without_search = window.location.href.replace(`filter=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_filter').detach();
		// ! change chosen / color
		$('.filter').trigger("chosen:updated");
		$('.filter').next('.chosen-container').find('.chosen-single span').css('color', '#000');
		// ! post again
		$('[name="quantity"]').val(0)
		post_filter_card();

	})

	// ? remove SEARCH-WORD
	// ? remove SEARCH-COMPANY


	// ? remove SALARY

	// ? remove EXPERIENCE

	// ? remove DURATION

	// ? remove LOCATION

	// ? remove WORKLOAD

	// ? remove almost ALL
	$(document).on('click', '.close-cancel-filter', function () {

		// ! colorInfo
		var this_class = this.className.replace('close-cancel-filter close_cancel_filter_', '');
		
		prepareColorInfo();

		colorInfo = colorInfo.filter(v => v != this_class);
		// ? colorInfo

		var className = this.className.replace('close-cancel-filter ', '').replace('close_cancel_filter_', '');
		if(className == 'word'){
			// ! NULL select/input
			$('.filter-form').find(`.search-${className}`).prepend('<option disabled selected value="0">title</option>');
			$('.filter-form').find(`.search-${className}`).trigger('chosen:updated');
		} 
		else if(className == 'company'){
			// ! NULL select/input
			$('.filter-form').find(`.search-${className}`).prepend('<option disabled selected value="0">company</option>');
			$('.filter-form').find(`.search-${className}`).trigger('chosen:updated');
		}
		else {
			// ! NULL select/input
			$('.filter-form').find(`.search-${className}`).val("");
			$('.filter-form').find(`.search-${className}`).trigger('chosen:updated');
		}
		var searched_word = encodeURI($(this).prev('div').text().trim());
		if(className == 'company' || className == 'word'){
			// ! push URL
			var without_search = window.location.href.replace(`search-${className}=${searched_word}&`, '').replace(/quantity.*?&/, '');
		} else {
			// ! push URL
			var without_search = window.location.href.replace(`${className}=${searched_word}&`, '').replace(/quantity.*?&/, '');
		}
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find(`.cancel_filter_${className}`).detach();
		// ! change chosen / color
		$(`.search-${className}`).trigger("chosen:updated");
		$(`.search-${className}`).next('.chosen-container').find('.chosen-single span').css('color', '#000');
		// ! post again
		$('[name="quantity"]').val(0)
		post_filter_card(colorInfo);
	})


	

	// ! CANCEL_ALL_FILTERS
	$(document).on('click', '.cancel_all_filters', function () {
		history.pushState(null, '', '/');
		window.location.href = card_from;
	})
})

