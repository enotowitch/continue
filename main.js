$(document).ready(function () {

	$('.burger__menu').hide();

	$('.burger__button').on('click', function () {
		$('.burger__line').toggleClass('burger__line_active');
		$('.burger__menu').toggle();

	})

	$('.switch').on('click', function () {
		$('.card').not('.fill-cards').toggleClass('w100');
	})

	// ! delete

	$('.form-card').on('submit', function(){
		var еее = $('.card__title').val();
		var ggg = $('.card__subt').val();
		alert(еее + ggg);
	})

})
