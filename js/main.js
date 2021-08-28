$(document).ready(function () {

	render_flags();

	var burgerMenu = $('.burger__menu');
	var burger_line = $('.burger__line');
	var card = $('.card');
	var banner = $('.banner');

	var infoCell = $('.info__cell');
	var tagsSelect = $('.tags__select');

	// ! burgerMenu

	burgerMenu.hide();

	$('.burger__button').on('click', function () {
		burger_line.toggleClass('burger__line_active');
		burgerMenu.toggle(300);

	})

	burgerMenu.on('click', function () {
		$(this).hide(300);
		burger_line.toggleClass('burger__line_active');
		$('.post-show').detach();
	})

	// ! burgerMenu click outside
	$(document).mouseup(function (e) {
		if (
			!burger_line.is(e.target) &&
			burger_line.has(e.target).length === 0 &&
			!burgerMenu.is(e.target) &&
			burgerMenu.has(e.target).length === 0
		) {
			burgerMenu.hide(300);
			burger_line.removeClass('burger__line_active');
		}
	});

	// ! current user / new user animations

	var current_user = $('.current_user').val();
	var new_user_post = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100').eq(0);
	var current_user_posts = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100');

	current_user_posts.find('.apply').addClass('op03');


	new_user_post.append('<div class="post-anim"></div>');

	setTimeout(() => {

		$('.post-anim').animate({ 'width': '100%' });

	}, 600);

	setTimeout(() => {
		$('.post-anim').detach();
	}, 1200);



	// ! cross_reset form reset
	$('.cross_reset').on('click', function (e) {
		e.preventDefault();
		if (confirm("Are you sure you want to clear this form?")) {
			location.reload();
		}
	})

	// ! hide post
	$('.cross_post').on('click', function () {
		post_hide();
	})

	$(document).on('click', '.post-show', function () {
		post.slideDown(600);
		$('.post-show').detach();
	})

	// ! search

	var search = $('.search');
	var searchIcon = $('.search-icon');
	var searchTopic = $('.search').find('.search__topic');
	var searchTags = $('.search__tags');

	searchIcon.on('click', function () {
		search.slideDown(600);
		post.slideUp(600);
		banner.slideUp(600);
	})

	searchTopic.on('click', function () {
		searchTopic.removeClass('search__topic_active').eq($(this).index()).addClass('search__topic_active');
		searchTags.removeClass('search__tags_active').eq($(this).index()).addClass('search__tags_active');

	})

	$('.cross_search').on('click', function () {
		post.slideDown(600);
		search.slideUp(600);
		banner.slideDown(600);
	})


	// ! switch

	$('.switch-size').on('change', function () {

		var size = $(this).val();

		if (size != 'change size') {
			// ! cookie size
			document.cookie = `size=${size}`;
			window.location.reload();
		}





	})





	// ! autocomlete titles
	$(function () {

		$.post({
			'url': 'autocomplete.php',
			'data': { card_from: card_from },
			dataType: 'json',
			success: function (data) {

				$.each(data.title, function (element, i) {
					$('.search-word').append(`<option value="${i}">${i}</option>`);
					$('.search-word').trigger('chosen:updated');
				})
				$.each(data.subt, function (element, i) {
					$('.search-company').append(`<option value="${i}">${i}</option>`);
					$('.search-company').trigger('chosen:updated');
				})

				

			}
		})
	});


	// ! search CLICK in card

	$(document).on('click', '#salary, #experience, #location, #duration, #workload', function () {
		var text = $(this).text().trim();
		var search_id = this.id;
		$(`.search-${search_id}`).css({ 'color': '#6fda44' });

		// ! salary
		for (var i = 1; i <= 5; i++) {
			if (text == `$${i}/h`) {
				var text = '$1-$5/h';
			}
		}
		for (var i = 5; i <= 10; i++) {
			if (text == `$${i}/h`) {
				var text = '$5-$10/h';
			}
		}
		for (var i = 10; i <= 15; i++) {
			if (text == `$${i}/h`) {
				var text = '$10-$15/h';
			}
		}
		for (var i = 15; i <= 20; i++) {
			if (text == `$${i}/h`) {
				var text = '$15-$20/h';
			}
		}
		for (var i = 20; i <= 25; i++) {
			if (text == `$${i}/h`) {
				var text = '$20-$25/h';
			}
		}
		for (var i = 25; i <= 30; i++) {
			if (text == `$${i}/h`) {
				var text = '$25-$30/h';
			}
		}
		for (var i = 30; i <= 35; i++) {
			if (text == `$${i}/h`) {
				var text = '$30-$35/h';
			}
		}
		for (var i = 35; i <= 40; i++) {
			if (text == `$${i}/h`) {
				var text = '$35-$40/h';
			}
		}
		for (var i = 40; i <= 45; i++) {
			if (text == `$${i}/h`) {
				var text = '$40-$45/h';
			}
		}
		for (var i = 45; i <= 50; i++) {
			if (text == `$${i}/h`) {
				var text = '$45-$50/h';
			}
		}
		for (var i = 50; i <= 60; i++) {
			if (text == `$${i}/h`) {
				var text = '$50-$60/h';
			}
		}
		for (var i = 60; i <= 70; i++) {
			if (text == `$${i}/h`) {
				var text = '$60-$70/h';
			}
		}
		for (var i = 70; i <= 80; i++) {
			if (text == `$${i}/h`) {
				var text = '$70-$80/h';
			}
		}
		for (var i = 80; i <= 90; i++) {
			if (text == `$${i}/h`) {
				var text = '$80-$90/h';
			}
		}
		for (var i = 90; i <= 100; i++) {
			if (text == `$${i}/h`) {
				var text = '$90-$100/h';
			}
		}
		for (var i = 100; i <= 200; i++) {
			if (text == `$${i}/h`) {
				var text = '$100-$200/h';
			}
		}
		// ! workload
		for (var i = 1; i <= 40; i++) {
			if (text == `${i} h/mo`) {
				var text = '1-40 h/mo';
			}
		}
		for (var i = 40; i <= 80; i++) {
			if (text == `${i} h/mo`) {
				var text = '40-80 h/mo';
			}
		}
		for (var i = 80; i <= 120; i++) {
			if (text == `${i} h/mo`) {
				var text = '80-120 h/mo';
			}
		}
		for (var i = 120; i <= 160; i++) {
			if (text == `${i} h/mo`) {
				var text = '120-160 h/mo';
			}
		}
		for (var i = 160; i <= 200; i++) {
			if (text == `${i} h/mo`) {
				var text = '160-200 h/mo';
			}
		}
		for (var i = 200; i <= 250; i++) {
			if (text == `${i} h/mo`) {
				var text = '200-250 h/mo';
			}
		}
		// ! experience
		for (var i = 10; i <= 50; i++) {
			if (text == `${i} years`) {
				var text = '10-50 years';
			}
		}


		$(`.search-${search_id}`).val(`${text}`);

		last_filter(text, search_id);
		// ! post
		$('.go-to-first').eq(0).trigger('click');

	})

	// ! forgot-pass
	$('.forgot-pass').on('click', function (e) {

		$('.reset_mail').detach();

		var mail = $('[name="user_mail"]').val();

		if (mail == '') {
			$('.reset_mail').detach();
			$(this).prepend('<div class="reset_mail">Enter email!</div>');
		} else {

			$.post({
				'url': 'forgot-pass.php',
				'data': { mail: mail },
				'dataType': 'json',
				success: function (data) {
					if (data.status == false) {
						$(e.target).after('<div class="reset_mail danger">' + data.msg + '</div>');
					}
					if (data.status == true) {
						$(e.target).after('<div class="reset_mail brand">' + data.msg + '</div>');
						$('.forgot-pass').text('');
					}

				}
			})


		}


	})

	// ! test change_pass
	$('.change_pass').on('click', function () {
		$('.log-as').after().load('user-form-change-pass.php');
		$('.stat-wrap').hide();
	})


	// ! user-form-change-pass
	$(document).on('submit', '.user-form-change-pass', function (e) {
		e.preventDefault();

		// ! PRE-POST validation
		if ($('[name="old_pass"]').val() == '' || $('[name="new_pass"]').val() == '' || $('[name="new_pass2"]').val() == '') {
			error_in_fields('All fields required!', 'old_pass', 'new_pass', 'new_pass2');
			$('input:not([type="submit"])').each(function () {
				if ($(this).val() != '') {
					$(this).removeClass('red-b');
				}
			})
			return;
		}
		if ($('[name="new_pass"]').val() != $('[name="new_pass2"]').val()) {
			error_in_fields('passwords don\'t match!', 'new_pass', 'new_pass2');
			return;
		}
		if ($('[name="new_pass"]').val().length <= 7 || $('[name="new_pass2"]').val().length <= 7) {
			error_in_fields('Short Password!', 'new_pass', 'new_pass2');
			$('input[type="submit"]').after('<div class="danger">Minimum password length is<br> 8 characters</div>');
			return;
		}


		$.post({
			url: 'user-change-pass.php',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				// FALSE
				if (data.status == false) {
					// ! json
					data.field.forEach(field => {
						$(document).find(`[name="${field}"]`).addClass('red-b');
					});
					$('[type="submit"]').val(data.msg).addClass('red');
					// ? json
					setTimeout(() => {
						$('[name*="pass"]').removeClass('red-b');
						$('[type="submit"]').val('Change Password').removeClass('red');
					}, 600);
				}
				// TRUE
				if (data.status == true) {
					$('[type="submit"]').val(data.msg).attr('disabled', true);
					$(e.target).hide();
					$('.log-as').append('<div class="your m0a" style="height: 290px; line-height: 290px;">Password changed! Check Email!</div>');
				}
			}
		}).done(function () {
			// ! done = allow post again
			$('[type="submit"]').attr('disabled', false);
		});
		// ! post 1 time = wait
		$('[type="submit"]').val('waiting...').attr('disabled', true);

	})

	// ! test del_account

	$('.del_account').on('click', function () {

		if (confirm('Sure you want to delete your account FOREVER?')) {
			$.post({
				'url': 'delete-account.php',
				success: function () {
					window.location.reload();
				}
			})
		}

	})

	// ! test available tags

	// ! search_tags
	var search_tags = [];
	$('.search').find('.tag').each(function () {
		search_tags.push($(this).text().trim());
	});
	// ? search_tags
	// ! page_tags
	var page_tags = [];
	$.post({
		url: 'tags-available.php',
		data: { card_from: card_from },
		dataType: 'json',
		success: function (data) {
			$.each(data, function (i, el) {
				page_tags.push(el);
			});
			// highlight_tags - duplicates SEARCH = ALL TAGS(not hidden, not applied) 
			var highlight_tags = page_tags.filter(function (n) {
				return search_tags.indexOf(n) !== -1;
			});
			// ! highlight_tags
			$('.tag').addClass('tag-no-db');
			for (var i = 0; i < highlight_tags.length; i++) {
				$('.search').find(`.tag:contains("${highlight_tags[i]}")`).each(function () {
					if ($(this).text().trim() == highlight_tags[i]) {
						$(this).addClass('highlight-tag').removeClass('tag-no-db');
					}
				});
				$('.search-tags-list').find('option').each(function(){
					if ($(this).text().trim() == highlight_tags[i]) {
						$(this).addClass('highlight');
					}
				})
				$('.search-tags-list').trigger("chosen:updated");
			}
		}
	})
	// ? page_tags

	// ? test available tags

	// ! test color select & input type="text" in SEARCH
	// select
	// on load
	setTimeout(() => {
		$('.sort-flex').find('select').each(function () {
			// todo $(this).val() != 0
			var val_0 = $(this).find('option:eq(0)').val();
			var val_selected = $(this).find('option:selected').val();
			if (val_0 != val_selected) {
				$(this).css({ 'color': '#6fda44' });
			}
		})
	}, 500);
	// on change
	$('.sort-flex').find('select').on('change', function () {
		$(this).next('.chosen-container').find('.chosen-single span').css({ 'color': '#6fda44', 'font-weight': '700' });
	});
	// input type="text"
	// on load
	$('.sort-flex').find('[type="text"]').each(function () {
		$(this).css({ 'color': '#6fda44', 'font-weight': '700' });
	});
	// on change
	$('.sort-flex').find('[type="text"]').on('change', function () {
		$(this).css({ 'color': '#6fda44' });
	});

		// ! chosen

		infoCell.not('.info__example').not('.info__simple').chosen();
		tagsSelect.chosen({ max_selected_options: 3 });
		$('.search-tags-list').chosen({ max_selected_options: 1 });
		$('.sort-flex').find('select').not('[name="tags"], .search-location, .search-word, .search-company').each(function(){
			$(this).chosen({ max_selected_options: 1, display_disabled_options: false, disable_search: true });
		})
		$('.search-location, .search-word, .search-company').chosen({ max_selected_options: 1, display_disabled_options: false, disable_search: false });

	// ! TEST load-more
	$(window).scroll(function () {
		if ($(window).scrollTop() == $(document).height() - $(window).height()) {
			$('.load-more').show().trigger('click');
		}
	});

	$(document).on('click', '.load-more', function () {
		var quantity = $(document).find('.card').not('.not100').length;
		var cat = window.location.href.includes('portfolio') ? 'folio' : 'job';

		$.post({
			'url': 'load-more.php',
			'data': { card_from: card_from, quantity: quantity, cat: cat },
			'dataType': 'json',
			success: function (data) {
				// ! NO NEW POSTS -> data == null
				if (data == null) {
				$(document).find('.load-more').detach();
					}
					// ! render cards
				$.each(data, function (i, e) {
					$('.card-flex').append(`<div class="card card_main w100 ${e.size}">
		
					<div class="card__content">
						
						<input class="cat" type="hidden" value="${e.cat}">		
						<input class="card_id" type="hidden" value="${e.id}">
						<input class="user_id" type="hidden" value="${e.user_id}">
						<input class="current_user" type="hidden" value="${e.current_user}">
						
						<!-- todo -->
						<input class="card_from" type="hidden" value="">
						<!-- todo -->

						<img class="card__logo" src="${e.logo}" alt="card__logo">
						<div class="inner-card-flex">
							<div class="title-and-subt">
								<div class="card__title">${e.title}</div>
								<div class="card__subt">${e.subt}</div>
							</div>
						
							<div class="info">
								<div class="info__flex">
									<div class="info__block">
										<div class="info__cell info__simple salary" id="salary">
											${e.salary}				</div>
										<div class="info__cell info__simple duration" id="duration">
											${e.duration}						</div>
									</div>
									<div class="info__block">
										<div class="info__cell info__simple experience" id="experience">
											${e.experience}					</div>
										<div class="info__cell info__simple workload" id="workload">
											${e.workload}					</div>
									</div>
									<div class="info__block">
										<div class="info__cell info__simple location" id="location"><img src="img/icons/flags/gi.png">${e.location}</div>
										<div class="info__cell info__simple example-small-slick">
											Examples
										</div>
									</div>
								</div>
							</div>
							<div class="tags-pics-flex">
								<div class="tags tags_main">
									<div class="tag tag_main tag-no-db">
										${e.tag_1}				</div>
									<div class="tag tag_main tag-no-db">
										${e.tag_2}				</div>
									<div class="tag tag_main tag-no-db">
										${e.tag_3}				</div>
								</div>

								<div class="info__cell info__simple info__pics">
									<img class="img-zoom" data-lazy="${e.example_1}" src="${e.example_1}">
									<img class="img-zoom" data-lazy="${e.example_2}" src="${e.example_2}">
									<img class="img-zoom" data-lazy="${e.example_3}" src="${e.example_3}">
									<img class="img-zoom" data-lazy="${e.example_4}" src="${e.example_4}">
									<img class="img-zoom" data-lazy="${e.example_5}" src="${e.example_5}">
									<img class="img-zoom" data-lazy="${e.example_6}" src="${e.example_6}">
									<img class="img-zoom" data-lazy="${e.example_7}" src="${e.example_7}">
									<img class="img-zoom" data-lazy="${e.example_8}" src="${e.example_8}">
									<img class="img-zoom" data-lazy="${e.example_9}" src="${e.example_9}">
									<img class="img-zoom" data-lazy="${e.example_10}" src="${e.example_10}">
								</div>

							</div>
						</div>
						
						<div class="inter-icons">
							<img class="hide" src="img/icons/delete.svg" alt="del">
							<img class="like" src="img/icons/like.svg" alt="like">
							<img class="apply get-mes-form op03" src="img/icons/apply.svg" alt="apply">
						</div>
						<div class="time">${e.time}</div>
					</div>
						</div>`);
				})
				// ? render cards
				$('.apply').not('.ok-gray').addClass('get-mes-form');
				$('img[src="null"]').detach();
				render_hidden();
				render_liked();
				render_applied();
				render_flags();
				render_update_icon();
				// ! slick only 10 last loaded cards
				var card_length = ($('.card').not('.not100').length);
				for(var i=1;i<=10;i++){
					my_slick($('.card').not('.not100').eq(card_length-i).find('.info__pics'));
				}

			}
		})
	})

	// ! TEST load-more-search

	// ! more
	$(document).on('click', '.load-more-search', function () {


		if (!window.location.href.includes('quantity')) {
			quantity = 0;
		} else {
			var quantity = parseInt(window.location.href.split('quantity=')[1].replace('&', ''));
		}

		quantity += 12;
		$('.filter-form').find(`[name="quantity"]`).val(`${quantity}`);
		// prevent load-more
		if ($('.card').not('.not100').length != 12) {
			$('.load-more-search').removeClass('load-more-search').addClass('load-more-search-fake');
			return;
		}
		// ! last filter
		var last_filter = window.location.href.split('?')[1];
		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/quantity.*?&/, '');
			history.pushState(null, '', `?${last_filter}quantity=${quantity}&`);
		} else {
			history.pushState(null, '', `?quantity=${quantity}&`);
		}
		post_filter_card();
	})
	// ! less
	$(document).on('click', '.load-less-search', function () {

		var quantity = parseInt(window.location.href.split('quantity=')[1].replace('&', ''));
		quantity -= 12;
		$('.filter-form').find(`[name="quantity"]`).val(`${quantity}`);
		// ! last filter
		var last_filter = window.location.href.split('?')[1];
		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/quantity.*?&/, '');
			history.pushState(null, '', `?${last_filter}quantity=${quantity}&`);
		} else {
			history.pushState(null, '', `?quantity=${quantity}&`);
		}
		post_filter_card();
	})
	// ! go-to-first
	$(document).on('click', '.go-to-first', function () {

		quantity = 0;
		$('.filter-form').append(`<input name="quantity" value="${quantity}" type="hidden">`);
		// ! last filter
		var last_filter = window.location.href.split('?')[1];
		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/quantity.*?&/, '');
			history.pushState(null, '', `?${last_filter}quantity=0&`);
		} else {
			history.pushState(null, '', `?quantity=0&`);
		}
		post_filter_card();
	})

	// ! TEST show-hidden-posts & show-applied-posts
	$(document).on('click', '.show-hidden-posts, .show-applied-posts', function () {
		var name = this.className;
		$('.filter-form').append(`<input name="${name}" type="hidden" value="1">`);

		post_filter_card();
	})
	// ! TEST dont-show-hidden-posts & dont-show-applied-posts
	$(document).on('click', '.dont-show-hidden-posts, .dont-show-applied-posts', function () {
		var name = this.className.replace("dont-", "");
		$('.filter-form').append(`<input name="${name}" type="hidden" value="">`);

		post_filter_card();
	})

	// ! TEST to top btn
	var btn = $('#button');

	$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			btn.addClass('show');
		} else {
			btn.removeClass('show');
		}
	});

	btn.on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, '300');
	});

	// ! TEST search-tags-list
	$('.search-tags-list').on('change', function(){

		var text = $(this).val();
		// ! change TOPIC depending on TAG
		// ! design
		var design = [];
		$('.load_design .search__tag').each(function(){design.push($(this).text().trim());});
		design.forEach(element => {if(text == element){$('.search-topic-design').trigger('click');}});
		// ? design
		// ! dev
		var dev = [];
		$('.load_dev .search__tag').each(function(){dev.push($(this).text().trim());});
		dev.forEach(element => {if(text == element){$('.search-topic-dev').trigger('click');}});
		// ? dev
		// ! videoAudio
		var videoAudio = [];
		$('.load_videoAudio .search__tag').each(function(){videoAudio.push($(this).text().trim());});
		videoAudio.forEach(element => {if(text == element){$('.search-topic-videoAudio').trigger('click');}});
		// ? videoAudio
		// ! marketing
		var marketing = [];
		$('.load_marketing .search__tag').each(function(){marketing.push($(this).text().trim());});
		marketing.forEach(element => {if(text == element){$('.search-topic-marketing').trigger('click');}});
		// ? marketing
		// ! writing
		var writing = [];
		$('.load_writing .search__tag').each(function(){writing.push($(this).text().trim());});
		writing.forEach(element => {if(text == element){$('.search-topic-writing').trigger('click');}});
		// ? writing
		// ! platformsSoft
		var platformsSoft = [];
		$('.load_platformsSoft .search__tag').each(function(){platformsSoft.push($(this).text().trim());});
		platformsSoft.forEach(element => {if(text == element){$('.search-topic-platformsSoft').trigger('click');}});
		// ? platformsSoft
		// ! other
		var other = [];
		$('.load_other .search__tag').each(function(){other.push($(this).text().trim());});
		other.forEach(element => {if(text == element){$('.search-topic-other').trigger('click');}});
		// ? other
		// ? change TOPIC depending on TAG
		$('[name="tags"]').html(`<option value="${text}"></option>`);
		// ! last filter
		var last_filter = window.location.href.split('?')[1];
		if (last_filter != undefined) {
			var last_filter = last_filter.replace(/search-tag.*?&/, '');
			history.pushState(null, '', `?${last_filter}search-tag=${text}&`);
		} else {
			history.pushState(null, '', `?search-tag=${text}&`);
		}
		post_filter_card();
	})
})