$(document).ready(function () {

	$('.burger__menu').hide();

	$('.burger__button').on('click', function () {
		$('.burger__line').toggleClass('burger__line_active');
		$('.burger__menu').toggle();

	})

	$('.switch').on('click', function () {
		$('.card').not('.prevent100').toggleClass('w100');
	})

	// ! delete

	$('.info__cell').not('.info__example').not('.info__simple').chosen();
	$('.tags__select').chosen({max_selected_options: 3});

	$('.form-card').on('submit', function () {
		var еее = $('.card__title').val();
		var ggg = $('.card__subt').val();
		alert(еее + ggg);
	})

})
