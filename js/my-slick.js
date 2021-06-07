	// ! slick

	my_slick('.info__pics');


	$('.ex').on('click', function (e) {

		$(e.target).closest('.card').find('.info__pics').slick('unslick');
		$(e.target).closest('.card').find('.info__pics').addClass('pics100');
		$(e.target).closest('.card').find('.info__pics').removeClass('info__pics');
		$(e.target).closest('.card').find('.tags').hide();

		$(e.target).closest('.card').find('.tags-pics-flex').append('<div class="close-pics"><img src="img/icons/cross.svg" alt="close-pics"></div>')

		var pics100 = $(e.target).closest('.card').find('.pics100');
		my_slick(pics100);

	});

	$(document).on('click', '.close-pics', function (e) {
		
		$(e.target).closest('.card').find('.pics100').addClass('info__pics');
		$(e.target).closest('.card').find('.pics100').removeClass('pics100');
		$(e.target).closest('.card').find('.tags').show();

		$(e.target).closest('.card').find('.close-pics').empty();


		

	})

// ! fake big slick slider

	$(document).ready(function(){

		$('.slider').slick();
		$('.slider-wrap').hide();


		$(document).on('click', '.img-zoom' ,function(){

			// ! destroy FAKE SLIDER
			$('.slider').slick("unslick");
		
			var cur_slick_index = $(this).closest('.slick-slide').attr('data-slick-index');
			var cloned_slick_slides = $(this).closest('.card').find('.img-zoom').addClass('zoom-out').clone();
			
			// ! removing 'nav-for' to prevent SLIDING different sliders  
			$('.card').find('.info__pics').removeClass('nav-for');
			$(this).closest('.card').find('.info__pics').addClass('nav-for');
		
			$('.slider').html(cloned_slick_slides);
			$('.slider').slick({asNavFor: '.nav-for', lazyLoad: 'ondemand', infinite: false, speed: 500, fade: true, cssEase: 'linear', slidesToShow: 1  });
			$('.slider').slick('goTo', parseInt(cur_slick_index));
		
			$('.slider-wrap').show();
		
		// ! removing class 'img-zoom' to prevent init SLIDER on already zoomed imgs
			$('.slider').find('.zoom-out').removeClass('img-zoom');
			
			$('.zoom-out').css({'width':'90%', 'left':'5%'})
		
		});

		// zoom-out

		$(document).on('click', '.zoom-out', function(){

			$('.slider').slick("unslick");
		
			$('.slider').empty();
			$('.slider-wrap').hide();
		// ! adding 'img-zoom' to be able to zoom again
			$('.card').find('.zoom-out').addClass('img-zoom').removeClass('zoom-out');
		
		});

	})