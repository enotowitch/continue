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
		$('.info__pics').toggleClass('dn');
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

	// ! delete

	$('.del').on('click', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();
		var card_from = $(this).closest('.card').find('.card_from').val();

		$.ajax({
			url: 'delete.php',
			type: 'POST',
			data: {
				card_id: card_id,
				card_from: card_from
			},
			// beforeSend: function () {
			// 	return confirm("Are you sure?");
			// },
			success: function () {
				$(e.target).closest('.card').append('<div class="del-anim"></div>');
				$('.del-anim').animate({ 'width': '100%' });
				setTimeout(() => {
					$(e.target).closest('.card').hide();
				}, 600);

			}
		})
	})

	// ! slick

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

	// ! DELETE THIS

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

	// ! REALLY DELETE THIS

	var current_user = $('.current_user').val();

	var current_user_posts = $('.user_id[value="' + current_user + '"]');

	current_user_posts.closest('.card').not('.not100').append('<div class="cur_user_anim"></div>');
	$('.cur_user_anim').animate({ 'width': '100%' }, 500);

	setTimeout(() => {
		$('.cur_user_anim').animate({ 'left': '100%' }, 500);
	}, 500);



})
