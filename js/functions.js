function my_alert(color, text) {

	$('.my-alert').detach();

	$('body').before(`<div class="my-alert ${color}">
	<div class="my-alert__bg bg-${color} bxsh-${color}"></div>
	<div class="my-alert__text">${text}</div>
	<img src="img/icons/cross.svg">
						</div>`);

}
function my_alert_filter(text1, text2, color, link) {
	(window.location.href.includes('?')) ? link = window.location.href.replace(/filter.*?&/, '') + link : link = window.location.href.replace(/filter.*?&/, '') + '?' + link;

	$('.my-alert').detach();
	$('body').before(`<div class="my-alert">
	<div class="my-alert__bg bg-${color} bxsh-${color}"></div>
	<div class="my-alert__text">${text1}&nbsp<a href="${link}" class="${color} tdu">${text2}</a></div>
						<img src="img/icons/cross.svg">
						</div>`);
}
function my_alert_login(color, text) {
	$('.my-alert').detach();
	$('body').before(`<div class="my-alert">
	<div class="my-alert__bg bg-danger bxsh-danger"></div>
	<div class="my-alert__text"><div>Please <a class="brand tdu" href="login.php">SIGN IN</a> or <a class="brand tdu" href="reg.php">SIGN UP</a> to <span class="${color}">${text}</span></div></div>
	<img src="img/icons/cross.svg">
						</div>`);
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

	if (card_from == '/mes.php') { return; }

	$.post({
		'url': 'filter-card.php',
		'data': $('.filter-form').serialize(),
		beforeSend: function () {
			// ! skeleton
			$('.card').not('.not100').html('<div class="sk__card"><div class="sk__logo sk-anim"></div><div class="sk__title sk-anim"></div><div class="sk__title2 sk-anim"></div><div class="sk__infos"><div class="sk__infos-section"><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div></div><div class="sk__infos-section"><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div></div></div><div class="sk__infos2"><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div><div class="sk__info sk-anim"></div></div></div>');
		},
		success: function (data) {
			$('.card-flex').html(data);
			render_hidden();
			render_liked();
			render_applied();
			render_flags();
			render_update_icon();
			if ($('.card').not('.not100').length == 0) {
				if (window.location.href.includes('quantity')) {
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
			$('.info__simple.example').addClass('example-small-slick');
			setTimeout(() => {
				my_slick($('.info__pics'));
			}, 100);
			$('.search-loader-top').detach();
		}
	}).done(function(){
		if (window.location.href.includes('messages')){
			render_mes_to_applicant();
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
		var last_filter = last_filter.replace(new RegExp("" + RegexEscape(search_id) + ".*?&"), '').replace(/quantity.*?&/, '');
		history.pushState(null, '', `?${last_filter}${search_id}=${text}&`);
	} else {
		history.pushState(null, '', `?${search_id}=${text}&`);
	}
}

function error_in_fields(error, target, target1, target2) {
	$(document).find('.danger').detach();

	var clone_text = $('[type="submit"]').val();

	// ! render danger
	$('[type="submit"]').val(`${error}`).addClass('red').attr('disabled', true);
	$('[name="' + target + '"], [name="' + target1 + '"], [name="' + target2 + '"]').each(function () {
		if ($(this).val() == '') {
			$(this).addClass('red-b');
		}
	})
	if ($('[name="new_pass"]').val() != $('[name="new_pass2"]').val()) {
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

function render_applied() {
	$.post({
		'url': 'messaged-filter.php',
		'dataType': 'json',
		success: function (data) {

			// ! load applied from DB
			data.forEach(element => {

				$('.card').each(function () {

					var id = $(this).find('.card_id').val();

					if (id == element) {
						$(this).not('.form-card').addClass('db-applied');
						$(this).find('.get-mes-form').addClass('yet-applied').addClass('op03');
					}
				})
			});
		}
	});
}

function render_liked() {
	$.post({
		'url': 'liked.php',
		'dataType': 'json',
		success: function (data) {

			// ! load likes from DB
			data.forEach(element => {

				$('.card').each(function () {

					var id = $(this).find('.card_id').val();

					if (id == element) {
						$(this).find('.like').attr('src', 'img/icons/liked.svg');
					}
				})
			});
		}
	});
}

function render_hidden() {
	$.post({
		'url': 'hidden.php',
		'dataType': 'json',
		success: function (data) {

			// ! load hidden from DB
			data.forEach(element => {

				$('.card').each(function () {

					var id = $(this).find('.card_id').val();

					if (id == element) {

						$(this).addClass('db-hidden');
						$(this).find('.hide').css({ 'border-bottom': '2px solid tomato', 'padding-bottom': '2px' });

					}
				})
			});
		}
	});
}

function render_flags() {
	$('.info__simple.location').each(function () {
		var text = $(this).text().trim().toLowerCase();
		$(this).html(`<img src="img/icons/flags/${text}.png">`).append(`${" " + text.toUpperCase()}`);
	})
}

function render_update_icon() {
	if (card_from == '/post-job.php' || card_from == '/post-portfolio.php') {
		$('.hide').after('<img class="update" src="img/icons/update.svg" alt="update">');
		$('.hide').detach();
	}
}
function render_cards(data) {
	// ! render cards
	$.each(data, function (i, e) {
		$('.card-flex').append(`<div class="card card_main w100 ${e.size}">
			
						<div class="card__content">
							
							<input class="cat" type="hidden" value="${e.cat}">		
							<input class="card_id" type="hidden" value="${e.id}">
							<input class="user_id" type="hidden" value="${e.user_id}">
							<input class="current_user" type="hidden" value="${e.current_user}">
							
							<!-- todo -->
							<input class="card_from" type="hidden" value="">
							<!-- todo -->
	
							<img class="card__logo" src="${e.logo}" alt="card__logo">
							<div class="inner-card-flex">
								<div class="title-and-subt">
									<div class="card__title">${e.title}</div>
									<div class="card__subt">${e.subt}</div>
								</div>
							
								<div class="info">
									<div class="info__flex">
										<div class="info__block">
											<div class="info__cell info__simple salary" id="salary">
												${e.salary}				</div>
											<div class="info__cell info__simple duration" id="duration">
												${e.duration}						</div>
										</div>
										<div class="info__block">
											<div class="info__cell info__simple experience" id="experience">
												${e.experience}					</div>
											<div class="info__cell info__simple workload" id="workload">
												${e.workload}					</div>
										</div>
										<div class="info__block">
											<div class="info__cell info__simple location" id="location"><img src="img/icons/flags/gi.png">${e.location}</div>
											<div class="info__cell info__simple example-small-slick">
												Examples
											</div>
										</div>
									</div>
								</div>
								<div class="tags-pics-flex">
									<div class="tags tags_main">
										<div class="tag tag_main tag-no-db">
											${e.tag_1}				</div>
										<div class="tag tag_main tag-no-db">
											${e.tag_2}				</div>
										<div class="tag tag_main tag-no-db">
											${e.tag_3}				</div>
									</div>
	
									<div class="info__cell info__simple info__pics">
										<img class="img-zoom" data-lazy="${e.example_1}" src="${e.example_1}">
										<img class="img-zoom" data-lazy="${e.example_2}" src="${e.example_2}">
										<img class="img-zoom" data-lazy="${e.example_3}" src="${e.example_3}">
										<img class="img-zoom" data-lazy="${e.example_4}" src="${e.example_4}">
										<img class="img-zoom" data-lazy="${e.example_5}" src="${e.example_5}">
										<img class="img-zoom" data-lazy="${e.example_6}" src="${e.example_6}">
										<img class="img-zoom" data-lazy="${e.example_7}" src="${e.example_7}">
										<img class="img-zoom" data-lazy="${e.example_8}" src="${e.example_8}">
										<img class="img-zoom" data-lazy="${e.example_9}" src="${e.example_9}">
										<img class="img-zoom" data-lazy="${e.example_10}" src="${e.example_10}">
									</div>
	
								</div>
							</div>
							
							<div class="inter-icons">
								<img class="hide" src="img/icons/delete.svg" alt="del">
								<img class="like" src="img/icons/like.svg" alt="like">
								<img class="apply get-mes-form op03" src="img/icons/apply.svg" alt="apply">
							</div>
							<div class="time">${e.time}</div>
						</div>
							</div>`);
	})
	// ? render cards
}
function render_mes_to_applicant(){
	$(document).find('.apply').addClass('mes-to-applicant').removeClass('get-mes-form').attr('src', 'img/icons/email.svg');
}
function hide_search_icon(){
	$('.search-icon').addClass('op0').css({'cursor':'default'});
}
function dont_load_more(){
	$('.card-flex').addClass('dont-load-more');
}