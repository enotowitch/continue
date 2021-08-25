$(document).ready(function () {

	// ! TAG
	$(document).on('click', '.tag', function () {

		if (card_from == '/mes.php') { return; }

		$('.tag').removeClass('empty-tag');
		var text = $(this).text().trim();

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
		$('.go-to-first').eq(0).trigger('click');

	})

	// ! FILTER
	$('.filter').on('change', function () {

		var text = $(this).val();


		if (text != 'filter') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/filter.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}filter=${text}&`);
			} else {
				history.pushState(null, '', `?filter=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}

	})

	// ! SEARCH-WORD
	$(document).on('keyup', '.search-word', function (e) {

		var text = $(this).val().trim();


		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-word.*?&/, '').replace(/quantity.*?&/, '');
			history.pushState(null, '', `?${last_filter}search-word=${text}&`);
		} else {
			history.pushState(null, '', `?search-word=${text}&`);
		}
		// ! post
		$('.go-to-first').eq(0).trigger('click');

		if (text.length == 0) {
			$('.search-result').find('.cancel_filter_word').detach();
		}
	})

	// ! SEARCH-COMPANY
	$(document).on('keyup', '.search-company', function (e) {

		var text = $(this).val().trim();


		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-company.*?&/, '').replace(/quantity.*?&/, '');
			history.pushState(null, '', `?${last_filter}search-company=${text}&`);
		} else {
			history.pushState(null, '', `?search-company=${text}&`);
		}
		// ! post
		$('.go-to-first').eq(0).trigger('click');

		if (text.length == 0) {
			$('.search-result').find('.cancel_filter_company').detach();
		}
	})

	// ! SALARY
	$(document).on('change', '.search-salary', function (e) {

		var text = $(this).val();

		if (text != 'salary') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/salary.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}salary=${text}&`);
			} else {
				history.pushState(null, '', `?salary=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}
	})

	// ! EXPERIENCE 
	$(document).on('change', '.search-experience', function (e) {

		var text = $(this).val();

		if (text != 'experience') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/experience.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}experience=${text}&`);
			} else {
				history.pushState(null, '', `?experience=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}

	})

	// ! DURATION
	$(document).on('change', '.search-duration', function (e) {

		var text = $(this).val();

		if (text != 'duration') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/duration.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}duration=${text}&`);
			} else {
				history.pushState(null, '', `?duration=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}

	})

	// ! LOCATION
	$(document).on('change', '.search-location', function (e) {

		var text = $(this).val();

		if (text != 'location') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/location.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}location=${text}&`);
			} else {
				history.pushState(null, '', `?location=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}

	})

	// ! WORKLOAD
	$(document).on('change', '.search-workload', function (e) {

		var text = $(this).val();

		if (text != 'workload') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/workload.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}workload=${text}&`);
			} else {
				history.pushState(null, '', `?workload=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}
	})

	// ! POSTED
	$(document).on('change', '.search-posted', function (e) {

		var text = $(this).val();

		if (text != 'posted') {


			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/posted.*?&/, '').replace(/quantity.*?&/, '');
				history.pushState(null, '', `?${last_filter}posted=${text}&`);
			} else {
				history.pushState(null, '', `?posted=${text}&`);
			}
			// ! post
			$('.go-to-first').eq(0).trigger('click');
		}
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
		// ! post again
		$('.go-to-first').eq(0).trigger('click');
	})

	// ? remove FILTER
	$(document).on('click', '.close_filter', function () {

		// ! NULL select/input
		$('.filter-form').find('select.filter').val('filter');

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
		$('.go-to-first').eq(0).trigger('click');

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

		var className = this.className.replace('close-cancel-filter ', '').replace('close_cancel_filter_', '');
		if(className == 'company' || className == 'word'){
			// ! NULL select/input
			$('.filter-form').find(`.search-${className}`).val('');
		} else {
			// ! NULL select/input
			$('.filter-form').find(`.search-${className}`).val(`${className}`);
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
		$('.go-to-first').eq(0).trigger('click');
	})

	// ! CANCEL_ALL_FILTERS
	$(document).on('click', '.cancel_all_filters', function () {
		history.pushState(null, '', '/');
		window.location.href = card_from;
	})
})

