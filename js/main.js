$(document).ready(function () {

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



	// ! chosen

	infoCell.not('.info__example').not('.info__simple').chosen();
	tagsSelect.chosen({ max_selected_options: 3 });

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

	// ! prevent enter btn submiting form in sort-flex
	$('.sort-flex').find('form').submit(function (e) {
		e.preventDefault();
	});



	// ! autocomlete titles
	$(function () {

		$.post({
			'url': 'autocomplete.php',
			'data': { card_from: card_from },
			dataType: 'json',
			success: function (data) {

				var availableTitles = [];
				var availableCompany = [];

				$.each(data.title, function (element, i) {
					availableTitles.push(i);
				})
				$.each(data.subt, function (element, i) {
					availableCompany.push(i);
				})

				$(".search-word").autocomplete({
					source: availableTitles
				});
				$(".search-company").autocomplete({
					source: availableCompany
				});
			}
		})
	});


	// ! search CLICK in card

	$(document).on('click', '#salary, #experience, #location, #duration, #workload', function () {
		var text = $(this).text().trim();
		var search_id = this.id;

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


		$('.search-icon').trigger('click');

		$(`.search-${search_id}`).val(`${text}`);
		post_filter_card();

		last_filter(text, search_id);

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
		if($('[name="old_pass"]').val() == '' || $('[name="new_pass"]').val() == '' || $('[name="new_pass2"]').val() == ''){
			error_in_fields('All fields required!', 'old_pass', 'new_pass', 'new_pass2');
			$('input:not([type="submit"])').each(function(){
				if($(this).val() != ''){
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

$('.del_account').on('click', function(){

	if(confirm('Sure you want to delete your account FOREVER?')){
		$.post({
			'url': 'delete-account.php',
			success: function () {
				window.location.reload();
			}
		})
	}

})

// ! test available tags

// ! page_tags
var page_tags = [];
$('.card-flex').find('.tag').each(function(){
	page_tags.push($(this).text().trim());
});
var unique_page_tags = [];
$.each(page_tags, function(i, el){
    if($.inArray(el, unique_page_tags) === -1) unique_page_tags.push(el);
});
// ? page_tags
// ! search_tags
var search_tags = [];
$('.search').find('.tag').each(function(){
	search_tags.push($(this).text().trim());
});
// ? search_tags
// highlight_tags in SEARCH which are on the PAGE 
var highlight_tags = unique_page_tags.filter(function(n) {
	return search_tags.indexOf(n) !== -1;
});

// ! highlight_tags
for (var i = 0; i < highlight_tags.length; i++) {
	$('.search').find(`.tag:contains("${highlight_tags[i]}")`).each(function(){
		if($(this).text().trim() == highlight_tags[i]){
			$(this).addClass('highlight-tag');
		}
	});
}
// ? test available tags

// ! test color select & input type="text" in SEARCH
// select
// on load
setTimeout(() => {
	$('.sort-flex').find('select').each(function(){
		// todo $(this).val() != 0
		var val_0 = $(this).find('option:eq(0)').val();
		var val_selected = $(this).find('option:selected').val();
		if(val_0 != val_selected){
			$(this).css({'color': '#6fda44'});
		}
	})
}, 500);
// on change
$('.sort-flex').find('select').on('change', function(){
	$(this).css({'color': '#6fda44'});
});
// input type="text"
// on load
$('.sort-flex').find('[type="text"]').each(function(){
	$(this).css({'color': '#6fda44'});
});
// on change
$('.sort-flex').find('[type="text"]').on('change', function(){
	$(this).css({'color': '#6fda44'});
});


})