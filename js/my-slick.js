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


	$('.ex').on('click', function (e) {

		$(e.target).closest('.card').find('.info__pics').slick('unslick');
		$(e.target).closest('.card').find('.info__pics').addClass('pics100');
		$(e.target).closest('.card').find('.info__pics').removeClass('info__pics');
		$(e.target).closest('.card').find('.tags').hide();

		$(e.target).closest('.card').find('.tags-pics-flex').append('<div class="close-pics"><img src="img/icons/cross.svg" alt="close-pics"></div>')

		$(e.target).closest('.card').find('.pics100').slick({
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
				{
					breakpoint: 499,
					settings: {
						infinite: true,
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
			]
		});
	});

	$(document).on('click', '.close-pics', function (e) {
		
		$(e.target).closest('.card').find('.pics100').addClass('info__pics');
		$(e.target).closest('.card').find('.pics100').removeClass('pics100');
		$(e.target).closest('.card').find('.tags').show();

		$(e.target).closest('.card').find('.close-pics').empty();


		

	})