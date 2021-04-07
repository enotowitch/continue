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

	// ! delete

	var searchTopic = $('.search__topic');
	var searchTags = $('.search__tags');

	searchTopic.on('click', function () {
		searchTopic.removeClass('search__topic_active').eq($(this).index()).addClass('search__topic_active');
		searchTags.removeClass('search__tags_active').eq($(this).index()).addClass('search__tags_active');

	})



})
