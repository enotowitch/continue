$(document).ready(function () {

	// ! TAG
	$(document).on('click', '.tag', function () {

		if (card_from == '/mes.php') {return;}

		var text = $(this).text().trim();

		// pass tag to hidden select in .filter-form
		$('.filter-form').find('select[name="tags"]').html(`<option value="${text}">${text}</option>`);

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-tag.*?&/, '').replace(/quantity.*?&/, '');
			$('.go-to-first').trigger('click');
			history.pushState(null, '', `?${last_filter}search-tag=${text}&`);
		} else {
			$('.go-to-first').trigger('click');
			history.pushState(null, '', `?search-tag=${text}&`);
		}

	})

	// ! FILTER
	$('.filter').on('change', function () {

		var text = $(this).val();


		if (text != 'filter') {

			// ! post
			post_filter_card();

			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/filter.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}filter=${text}&`);
			} else {
				history.pushState(null, '', `?filter=${text}&`);
			}
		}

	})

	// ! SEARCH-WORD
	$(document).on('keyup', '.search-word', function (e) {

		var text = $(this).val().trim();
		// ! post
		post_filter_card();

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-word.*?&/, '').replace(/quantity.*?&/, '');
			$('.go-to-first').trigger('click');
			history.pushState(null, '', `?${last_filter}search-word=${text}&`);
		} else {
			history.pushState(null, '', `?search-word=${text}&`);
		}

		if (text.length == 0) {
			$('.search-result').find('.cancel_filter_word').detach();
		}
	})

	// ! SEARCH-COMPANY
	$(document).on('keyup', '.search-company', function (e) {

		var text = $(this).val().trim();
		// ! post
		post_filter_card();

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-company.*?&/, '').replace(/quantity.*?&/, '');
			$('.go-to-first').trigger('click');
			history.pushState(null, '', `?${last_filter}search-company=${text}&`);
		} else {
			history.pushState(null, '', `?search-company=${text}&`);
		}

		if (text.length == 0) {
			$('.search-result').find('.cancel_filter_company').detach();
		}
	})

	// ! SALARY
	$(document).on('change', '.search-salary', function (e) {

		var text = $(this).val();

		if (text != 'salary') {
			// ! post
			post_filter_card();

			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/salary.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}salary=${text}&`);
			} else {
				history.pushState(null, '', `?salary=${text}&`);
			}
		}
	})

	// ! EXPERIENCE 
	$(document).on('change', '.search-experience', function (e) {

		var text = $(this).val();

		if (text != 'experience') {
			// ! post
			post_filter_card();
			
			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/experience.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}experience=${text}&`);
			} else {
				history.pushState(null, '', `?experience=${text}&`);
			}
		}

	})

	// ! DURATION
	$(document).on('change', '.search-duration', function (e) {

		var text = $(this).val();

		if (text != 'duration') {
			// ! post
			post_filter_card();
			
			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/duration.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}duration=${text}&`);
			} else {
				history.pushState(null, '', `?duration=${text}&`);
			}
		}

	})

	// ! LOCATION
	$(document).on('change', '.search-location', function (e) {

		var text = $(this).val();

		if (text != 'location') {
			// ! post
			post_filter_card();
			
			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/location.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}location=${text}&`);
			} else {
				history.pushState(null, '', `?location=${text}&`);
			}
		}

	})

	// ! WORKLOAD
	$(document).on('change', '.search-workload', function (e) {

		var text = $(this).val();

		if (text != 'workload') {
			// ! post
			post_filter_card();

			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/workload.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}workload=${text}&`);
			} else {
				history.pushState(null, '', `?workload=${text}&`);
			}
		}
	})

	// ! POSTED
	$(document).on('change', '.search-posted', function (e) {

		var text = $(this).val();

		if (text != 'posted') {
			// ! post
			post_filter_card();

			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/posted.*?&/, '').replace(/quantity.*?&/, '');
				$('.go-to-first').trigger('click');
				history.pushState(null, '', `?${last_filter}posted=${text}&`);
			} else {
				history.pushState(null, '', `?posted=${text}&`);
			}
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
		$('.go-to-first').trigger('click');
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
		// ! post again
		$('.go-to-first').trigger('click');

	})

	// ? remove SEARCH-WORD
	$(document).on('click', '.close_cancel_filter_word', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-word').val('');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`search-word=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_word').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove SEARCH-COMPANY
	$(document).on('click', '.close_cancel_filter_company', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-company').val('');

		// ! push URL
		var searched_company = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`search-company=${searched_company}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_company').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove SALARY
	$(document).on('click', '.close_cancel_filter_salary', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-salary').val('salary');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`salary=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_salary').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove EXPERIENCE
	$(document).on('click', '.close_cancel_filter_experience', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-experience').val('experience');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`experience=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_experience').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove DURATION
	$(document).on('click', '.close_cancel_filter_duration', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-duration').val('duration');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`duration=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_duration').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove LOCATION
	$(document).on('click', '.close_cancel_filter_location', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-location').val('location');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`location=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_location').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove WORKLOAD
	$(document).on('click', '.close_cancel_filter_workload', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-workload').val('workload');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`workload=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_workload').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ? remove POSTED
	$(document).on('click', '.close_cancel_filter_posted', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-posted').val('posted');

		// ! push URL
		var searched_word = encodeURI($(this).prev('div').text().trim());
		var without_search = window.location.href.replace(`posted=${searched_word}&`, '').replace(/quantity.*?&/, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_posted').detach();
		// ! post again
		$('.go-to-first').trigger('click');
	})

	// ! CANCEL_ALL_FILTERS
	$(document).on('click', '.cancel_all_filters', function(){
		history.pushState(null, '', '/');
		window.location.href = card_from;
	})
})

