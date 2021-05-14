$(document).ready(function () {

	var burgerMenu = $('.burger__menu');
	var card = $('.card');

	var infoCell = $('.info__cell');
	var tagsSelect = $('.tags__select');

	// ! burgerMenu

	burgerMenu.hide();

	$('.burger__button').on('click', function () {
		$('.burger__line').toggleClass('burger__line_active');
		burgerMenu.toggle();

	})

	// ! switch

	$('.switch').on('click', function () {
		card.not('.not100').toggleClass('w100');
		$('.info__pics').toggleClass('dn-imp');
	})

	// ! chosen

	infoCell.not('.info__example').not('.info__simple').chosen();
	tagsSelect.chosen({ max_selected_options: 3 });

	// ! search

	var search = $('.search');
	var searchIcon = $('.search-icon');
	var searchTopic = $('.search__topic');
	var searchTags = $('.search__tags');

	searchIcon.on('click', function () {
		// !!!
		search.next().toggle();
		search.toggleClass('search_active');
	})

	searchTopic.on('click', function () {
		searchTopic.removeClass('search__topic_active').eq($(this).index()).addClass('search__topic_active');
		searchTags.removeClass('search__tags_active').eq($(this).index()).addClass('search__tags_active');

	})


	// ! slick

	$('.info__pics').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
			{
				breakpoint: 650,
				settings: {
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 550,
				settings: {
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
		]
	});


	$('.ex').on('click', function () {
		$('.info__pics').slick('unslick');
		$('.info__pics').addClass('pics100');
		$('.info__pics').removeClass('info__pics');
		$('.tags').hide();

		$('.tags-pics-flex').append('<div class="close-pics"><img src="img/icons/cross.svg" alt="close-pics"></div>')

		$('.pics100').slick({
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 5,
			responsive: [
				{
					breakpoint: 650,
					settings: {
						infinite: true,
						slidesToShow: 4,
						slidesToScroll: 4,
					}
				},
				{
					breakpoint: 550,
					settings: {
						infinite: true,
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
			]
		});
	});

	$(document).on('click', '.close-pics', function () {
		$('.pics100').slick('unslick');
		$('.pics100').addClass('info__pics');
		$('.pics100').removeClass('pics100');
		$('.tags').show();

		$('.close-pics').empty();

		$('.info__pics').slick({
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 5,
			responsive: [
				{
					breakpoint: 650,
					settings: {
						infinite: true,
						slidesToShow: 4,
						slidesToScroll: 4,
					}
				},
				{
					breakpoint: 550,
					settings: {
						infinite: true,
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
			]
		});

	})

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

		$('.sort-my').text('MY POSTS').addClass('sort-all').removeClass('sort-my');

	});

	$(document).on('click', '.sort-all', function () {


		$('.card').removeClass('dn');

		$('.sort-all').text('ALL POSTS').addClass('sort-my').removeClass('sort-all');

	})

	// ! DELETE THIS

})