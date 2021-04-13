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
				$(e.target).closest('.card').hide();
			}
		})
	})

	// ! DELETE THIS

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

})
