function my_alert(color, text) {

	$('.please-log').detach();

	$('body').before('<div class="please-log ' + color + '">' + text + '<img src="img/icons/cross.svg"></div>');

}
function my_alert_filter(text1, text2, color, link){
	(window.location.href.includes('?')) ? link = window.location.href.replace(/filter.*?&/, '')+link : link = window.location.href.replace(/filter.*?&/, '')+'?'+link;
	
	$('.please-log').detach();
	$('body').before('<div class="please-log">' + text1 + ' <a href="'+link+'" class="' + color + ' tdu">' + text2 + '</a><img src="img/icons/cross.svg"></div>');
}
function my_alert_login(color, action){
	$('.please-log').detach();
	$('body').before('<div class="please-log">Please <a class="brand tdu" href="login.php">SIGN IN</a> or <a class="brand tdu" href="reg.php">SIGN UP</a> to <span class="'+color+'">'+action+'</span><img src="img/icons/cross.svg"></div>');
}

var post = $('.post');

function post_hide() {
	$('.post-show').detach();
	post.before('<div class="burger__button post-show"><div class="burger__line"></div></div>');
	post.slideUp(600);
}

function my_slick(target) {

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

function my_slick_small(target) {

	$(target).slick({
		asNavFor: '.slider',
		lazyLoad: 'ondemand',
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

}

function my_slick_3(target) {

	$(target).slick({
		lazyLoad: 'ondemand',
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 3
	});

}

function post_filter_card() {

	$.post({
		'url': 'filter-card.php',
		'data': $('.filter-form').serialize(),
		beforeSend: function(){
			$('.card').addClass('op0');
			$('.card-flex').append('<div class="search-loader"></div>');
		},
		success: function (data) {
			$('.card-flex').html(data);
			if($('.card').length == 0){
				$('.go-to-first').trigger('click');
				if(window.location.href.includes('quantity')){
					// ! last filter
					var last_filter = window.location.href.split('?')[1];

					if (last_filter != undefined) {
						var last_filter = last_filter.replace(/quantity.*?&/, '');
						history.pushState(null, '', `?${last_filter}quantity=0&`);
					} else {
						history.pushState(null, '', `?quantity=0&`);
					}
				}
			}
			$('.load-more').hide();
			setTimeout(() => {
				my_slick('.info__pics');
			}, 300);
		}
	})

}

function post_filter_card_load(){
	$.post({
		'url': 'filter-card.php',
		'data': $('.filter-form').serialize(),
		success: function (data) {
			$('.card-flex').html(data);
			my_slick($('.info__pics'));
		}
	})
}

function last_filter(text, search_id) {
	
	// ! last filter
	var last_filter = window.location.href.split('?')[1];

	var RegexEscape = function (s) {
		return s.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&");
	};


	if (last_filter != undefined) {
		var last_filter = last_filter.replace(new RegExp("" + RegexEscape(search_id) + ".*?&"), '');
		history.pushState(null, '', `?${last_filter}${search_id}=${text}&`);
	} else {
		history.pushState(null, '', `?${search_id}=${text}&`);
	}
}

function error_in_fields(error, target, target1, target2){
	$(document).find('.danger').detach();

	var clone_text = $('[type="submit"]').val();

	// ! render danger
	$('[type="submit"]').val(`${error}`).addClass('red').attr('disabled', true);
	$('[name="'+target+'"], [name="'+target1+'"], [name="'+target2+'"]').each(function(){
		if($(this).val() == ''){
			$(this).addClass('red-b');
		}
	})
	if($('[name="new_pass"]').val() != $('[name="new_pass2"]').val()){
		$('[name="new_pass"],[name="new_pass2"]').addClass('red-b');
	}
	// ! unrender
	setTimeout(() => {
		$('[type="submit"]').val(`${clone_text}`).removeClass('red').attr('disabled', false);
		$('input').removeClass('red-b');
	}, 600);
	setTimeout(() => {
		$(document).find('.danger').detach();
	}, 3000);
}