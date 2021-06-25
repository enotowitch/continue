$(document).ready(function () {

	// ! TAG
	$('.tag').on('click', function () {

		if (card_from == '/mes.php') {
			return;
		}

		var text = $(this).text().trim();

		// pass tag to hidden select in .filter-form
		$('.filter-form').find('select[name="tags"]').empty();
		$('.filter-form').find('select[name="tags"]').append(`<option value="${text}">${text}</option>`);

		// ! post
		post_filter_card();

		// ! render 1
		$('.tag').removeClass('tag_active');
		$(`.tag:contains("${text}")`).addClass('tag_active');
		// ! render 2
		$('.search-result').find('.cancel_filter_tag').detach();
		$('.search-result').append(`<div class="cancel-filter cancel_filter_tag">${text}<span class="close-cancel-filter close_cancel_filter_tag"></span></div>`);

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-tag.*?&/, '');
			history.pushState(null, '', `?${last_filter}search-tag=${text}&`);
		} else {
			history.pushState(null, '', `?search-tag=${text}&`);
		}

	})

	// ! FILTER
	$('.filter').on('change', function () {

		var text = $(this).val();


		if (text != 'filter') {

			// ! post
			post_filter_card();

			// ! render
			$('.search-result').find('.cancel_filter_filter').detach();
			$('.search-result').append(`<div class="cancel-filter cancel_filter_filter">${text}<span class="close-cancel-filter close_filter"></span></div>`);

			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/filter.*?&/, '');
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

		// ! render
		$('.search-result').find('.cancel_filter_word').detach();
		$('.search-result').append(`<div class="cancel-filter cancel_filter_word"><span class="gray">Title:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_word"></span></div>`);

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-word.*?&/, '');
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

		// ! render
		$('.search-result').find('.cancel_filter_company').detach();
		$('.search-result').append(`<div class="cancel-filter cancel_filter_company"><span class="gray">Company:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_company"></span></div>`);

		// ! last filter
		var last_filter = window.location.href.split('?')[1];

		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-company.*?&/, '');
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
			// ! render
			$('.search-result').find('.cancel_filter_salary').detach();
			$('.search-result').append(`<div class="cancel-filter cancel_filter_salary"><span class="gray">Salary:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_salary"></span></div>`);

			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/salary.*?&/, '');
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
			// ! render
			$('.search-result').find('.cancel_filter_experience').detach();
			$('.search-result').append(`<div class="cancel-filter cancel_filter_experience"><span class="gray">Experience:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_experience"></span></div>`);
			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/experience.*?&/, '');
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
			// ! render
			$('.search-result').find('.cancel_filter_duration').detach();
			$('.search-result').append(`<div class="cancel-filter cancel_filter_duration"><span class="gray">Duration:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_duration"></span></div>`);
			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/duration.*?&/, '');
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
			// ! render
			$('.search-result').find('.cancel_filter_location').detach();
			$('.search-result').append(`<div class="cancel-filter cancel_filter_location"><span class="gray">Location:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_location"></span></div>`);
			// ! last filter
			var last_filter = window.location.href.split('?')[1];

			if (last_filter != undefined) {
				var last_filter = last_filter.replace(/location.*?&/, '');
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
				// ! render
				$('.search-result').find('.cancel_filter_workload').detach();
				$('.search-result').append(`<div class="cancel-filter cancel_filter_workload"><span class="gray">Workload:&nbsp</span>${text}<span class="close-cancel-filter close_cancel_filter_workload"></span></div>`);
	
				// ! last filter
				var last_filter = window.location.href.split('?')[1];
	
				if (last_filter != undefined) {
					var last_filter = last_filter.replace(/workload.*?&/, '');
					history.pushState(null, '', `?${last_filter}workload=${text}&`);
				} else {
					history.pushState(null, '', `?workload=${text}&`);
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
		var without_search = window.location.href.replace(`search-tag=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender 1
		$('.tag').removeClass('tag_active');
		// ! unrender 2
		$('.search-result').find('.cancel_filter_tag').detach();
		// ! post again
		post_filter_card();
	})

	// ? remove FILTER
	$(document).on('click', '.close_filter', function () {

		// ! NULL select/input
		$('.filter-form').find('select.filter').val('filter');

		// ! push URL
		var searched_word = $(this).closest('div').text().trim();
		var without_search = window.location.href.replace(`filter=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_filter').detach();
		// ! post again
		post_filter_card();

	})

	// ? remove SEARCH-WORD
	$(document).on('click', '.close_cancel_filter_word', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-word').val('');

		// ! push URL
		var searched_word = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`search-word=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_word').detach();
		// ! post again
		post_filter_card();
	})

	// ? remove SEARCH-COMPANY
	$(document).on('click', '.close_cancel_filter_company', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-company').val('');

		// ! push URL
		var searched_company = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`search-company=${searched_company}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_company').detach();
		// ! post again
		post_filter_card();
	})

	// ? remove SALARY
	$(document).on('click', '.close_cancel_filter_salary', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-salary').val('salary');

		// ! push URL
		var searched_word = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`salary=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_salary').detach();
		// ! post again
		post_filter_card();
	})

	// ? remove EXPERIENCE
	$(document).on('click', '.close_cancel_filter_experience', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-experience').val('experience');

		// ! push URL
		var searched_word = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`experience=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_experience').detach();
		// ! post again
		post_filter_card();
	})

	// ? remove DURATION
	$(document).on('click', '.close_cancel_filter_duration', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-duration').val('duration');

		// ! push URL
		var searched_word = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`duration=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_duration').detach();
		// ! post again
		post_filter_card();
	})

	// ? remove LOCATION
	$(document).on('click', '.close_cancel_filter_location', function () {

		// ! NULL select/input
		$('.filter-form').find('.search-location').val('location');

		// ! push URL
		var searched_word = encodeURI($(this).closest('div').text().trim());
		var without_search = window.location.href.replace(`location=${searched_word}&`, '');
		history.pushState(null, '', without_search);

		// ! unrender
		$('.search-result').find('.cancel_filter_location').detach();
		// ! post again
		post_filter_card();
	})

		// ? remove workload
		$(document).on('click', '.close_cancel_filter_workload', function () {

			// ! NULL select/input
			$('.filter-form').find('.search-workload').val('workload');
	
			// ! push URL
			var searched_word = encodeURI($(this).closest('div').text().trim());
			var without_search = window.location.href.replace(`workload=${searched_word}&`, '');
			history.pushState(null, '', without_search);
	
			// ! unrender
			$('.search-result').find('.cancel_filter_workload').detach();
			// ! post again
			post_filter_card();
		})

})

