$(document).ready(function () {

	var burgerMenu = $('.burger__menu');
	var burger_line = $('.burger__line');
	var card = $('.card');
	var banner = $('.banner');

	var infoCell = $('.info__cell');
	var tagsSelect = $('.tags__select');

	// ! burgerMenu

	burgerMenu.hide();

	$('.burger__button').on('click', function () {
		burger_line.toggleClass('burger__line_active');
		burgerMenu.toggle(300);

	})

	burgerMenu.on('click', function () {
		$(this).hide(300);
		burger_line.toggleClass('burger__line_active');
		$('.post-show').detach();
	})

	// ! burgerMenu click outside
	$(document).mouseup(function (e) {
		if (
			!burger_line.is(e.target) &&
			burger_line.has(e.target).length === 0 &&
			!burgerMenu.is(e.target) &&
			burgerMenu.has(e.target).length === 0
		) {
			burgerMenu.hide(300);
			burger_line.removeClass('burger__line_active');
		}
	});



	// ! chosen

	infoCell.not('.info__example').not('.info__simple').chosen();
	tagsSelect.chosen({ max_selected_options: 3 });

	// ! current user / new user animations

	var current_user = $('.current_user').val();
	var new_user_post = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100').eq(0);
	var current_user_posts = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100');


	new_user_post.append('<div class="post-anim"></div>');

	setTimeout(() => {

		$('.post-anim').animate({ 'width': '100%' });

	}, 600);

	setTimeout(() => {
		$('.post-anim').detach();
	}, 1200);

	

	// ! cross_reset form reset
	$('.cross_reset').on('click', function (e) {
		e.preventDefault();
		if (confirm("Are you sure you want to clear this form?")) {
			location.reload();
		}
	})

	// ! hide post
	$('.cross_post').on('click', function () {
		post_hide();
	})

	$(document).on('click', '.post-show', function () {
		post.slideDown(600);
		$('.post-show').detach();
	})

	// ! search

	var search = $('.search');
	var searchIcon = $('.search-icon');
	var searchTopic = $('.search').find('.search__topic');
	var searchTags = $('.search__tags');

	searchIcon.on('click', function () {
		search.slideDown(600);
		post.slideUp(600);
		banner.slideUp(600);
	})

	searchTopic.on('click', function () {
		searchTopic.removeClass('search__topic_active').eq($(this).index()).addClass('search__topic_active');
		searchTags.removeClass('search__tags_active').eq($(this).index()).addClass('search__tags_active');

	})

	$('.cross_search').on('click', function () {
		post.slideDown(600);
		search.slideUp(600);
		banner.slideDown(600);
	})


	// ! tags link

	var www = window.location.href;

	$('.tag').on('click', function () {

		var text = $(this).text().trim();
		//  get ALL AFTER last ?
		var last_filter = window.location.href.split('?').pop();
		var last_filter = last_filter.replaceAll('?', '');
		var last_filter = last_filter.replace(www, '');
		var last_filter = last_filter.replaceAll(/&search-tag.*&/g, '&');
		var link = last_filter+"&search-tag=" + text;

		window.location.href = "?"+link;
	})

	

	// ! switch

	$('.switch-size').on('change', function () {

		var size = $(this).val();

		if(size != 'change size' && current_user != ""){
			$.post({
				url: 'switch-size-db.php',
				data: { size: size,current_user:current_user },
				success: function (data) {
					window.location.reload();
				},
			})
		}


	})

	

	$('.filter').on('change', function () {

		var text = $(this).val();

		if(text != 'filter'){

			//  get ALL AFTER last ?
		var last_filter = window.location.href.split('?').pop();
		var last_filter = last_filter.replaceAll('?', '');
		var last_filter = last_filter.replace(www, '');
		var last_filter = last_filter.replaceAll(/&filter.*&/g, '&');
		var link = last_filter+"&filter=" + text;

		window.location.href = "?"+link;

		}


	})

// ! DELETE THIS

$(document).on('change', '.tags__select2', function(){

	var text = $(this).val();
	//  get ALL AFTER last ?
	var last_filter = window.location.href.split('?').pop();
	var last_filter = last_filter.replaceAll('?', '');
	var last_filter = last_filter.replace(www, '');
	var last_filter = last_filter.replaceAll(/&search-tag.*&/g, '&');
	var link = last_filter+"&search-tag=" + text;

	window.location.href = "?"+link;

})

$(document).on('change', '.search-word', function(){

	var text = $(this).val();

		//  get ALL AFTER last ?
	var last_filter = window.location.href.split('?').pop();
	var last_filter = last_filter.replaceAll('?', '');
	var last_filter = last_filter.replace(www, '');
	var last_filter = last_filter.replaceAll(/&search-word.*&/g, '&');
	var link = last_filter+"&search-word=" + text;

	window.location.href = "?"+link;

})


})