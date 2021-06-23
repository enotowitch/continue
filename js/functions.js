function my_alert(color, text){

		$('.please-log').detach();

		$('body').before('<div class="please-log '+color+'">'+text+'<img src="img/icons/cross.svg"></div>');
		
}

var post = $('.post');

function post_hide(){
	$('.post-show').detach();
	post.before('<div class="burger__button post-show"><div class="burger__line"></div></div>');
	post.slideUp(600);
}

function my_slick(target){

	$(target).slick({
		asNavFor: '.slider',
		lazyLoad: 'ondemand',
		infinite: false,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
			{
				breakpoint: 650,
				settings: {
					infinite: false,
					slidesToShow: 4,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 550,
				settings: {
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{
					breakpoint: 499,
					settings: {
						infinite: false,
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
		]
	});

}

function my_slick_small(target){

	$(target).slick({
		asNavFor: '.slider',
		lazyLoad: 'ondemand',
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

}

function my_slick_3(target){

	$(target).slick({
		lazyLoad: 'ondemand',
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 3
	});

}

function post_filter_card(){

	$.post({
		'url': 'filter-card.php',
		'data': $('.filter-form').serialize(),
		success: function (data) {
			$('.card-flex').html(data);
			setTimeout(() => {
				my_slick('.info__pics');
			}, 300);
		}
		})

}