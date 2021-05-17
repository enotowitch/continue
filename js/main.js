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
		$('.post-btn').detach();
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

	// ! switch

	$('.switch').on('click', function () {
		card.not('.not100').toggleClass('w100');
		$('.info__pics').toggleClass('dn-imp');
	})

	// ! chosen

	infoCell.not('.info__example').not('.info__simple').chosen();
	tagsSelect.chosen({ max_selected_options: 3 });






	// ! current user / new user animations

	var current_user = $('.current_user').val();
	var new_user_post = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100').eq(0);
	var current_user_posts = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100');


	new_user_post.append('<div class="new_user_post"></div>');

	setTimeout(() => {

		$('.new_user_post').animate({ 'left': '100%' }, 600);

	}, 600);

	setTimeout(() => {
		$('.new_user_post').detach();
	}, 1200);


	// ! sort MY POSTS & ALL POSTS

	$(document).on('click', '.sort-my', function () {


		$('.card').not(current_user_posts).addClass('dn');

		$('.sort-my').addClass('sort-all').removeClass('sort-my');

	});

	$(document).on('click', '.sort-all', function () {


		$('.card').removeClass('dn');

		$('.sort-all').addClass('sort-my').removeClass('sort-all');

	})

	// cross_reset form reset
	$('.cross_reset').on('click', function (e) {
		e.preventDefault();
		if (confirm("Are you sure you want to clear this form?")) {
			location.reload();
		}
	})

	var post = $('.post');

	// ! hide post
	$('.cross_post').on('click', function () {
		$('.post-btn').detach();
		post.before('<div class="burger__button post-btn"><div class="burger__line"></div></div>');
		post.slideUp(600);
	})

	$(document).on('click', '.post-btn', function () {
		post.slideDown(600);
		$('.post-btn').detach();
	})

	// ! search

	var search = $('.search');
	var searchIcon = $('.search-icon');
	var searchTopic = $('.search__topic');
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

	// ! DELETE THIS



})