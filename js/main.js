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

	current_user_posts.find('.apply').addClass('op03');


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


	// ! switch

	$('.switch-size').on('change', function () {

		var size = $(this).val();

		if (size != 'change size') {
			// ! cookie size
			document.cookie = `size=${size}`;
			window.location.reload();
		}





	})

	// ! prevent enter btn submiting form in sort-flex
	$('.sort-flex').find('form').submit(function (e) {
		e.preventDefault();
	});

	

	// ! autocomlete titles
	$(function () {

		$.post({
			'url': 'titles.php',
			'data': {card_from:card_from},
			dataType: 'json',
			success: function (data) {

				var availableTitles = [];

				$.each(data, function(element, i){
					availableTitles.push(i);
				})

				$(".search-word").autocomplete({
					source: availableTitles
				});
			}
		})
	});

		// ! autocomlete company
		$(function () {

			$.post({
				'url': 'company.php',
				'data': {card_from:card_from},
				dataType: 'json',
				success: function (data) {
	
					var availablecompany = [];
					
					$.each(data, function(element, i){
						availablecompany.push(i);
					})
					
					$(".search-company").autocomplete({
						source: availablecompany
					});
				}
			})
		});


// ! test search CLICK

		$(document).on('click', '#salary, #experience, #location, #duration, #workload', function(){
			var text = $(this).text().trim();
			var search_id = this.id;

			// ! salary
			for(var i = 1;i<=5;i++){
				if(text == `$${i}/h`){
					var text = '$1-$5/h';
				} 
			}
			for(var i = 5;i<=10;i++){
				if(text == `$${i}/h`){
					var text = '$5-$10/h';
				} 
			}
			for(var i = 10;i<=15;i++){
				if(text == `$${i}/h`){
					var text = '$10-$15/h';
				} 
			}
			for(var i = 15;i<=20;i++){
				if(text == `$${i}/h`){
					var text = '$15-$20/h';
				} 
			}
			for(var i = 20;i<=25;i++){
				if(text == `$${i}/h`){
					var text = '$20-$25/h';
				} 
			}
			for(var i = 25;i<=30;i++){
				if(text == `$${i}/h`){
					var text = '$25-$30/h';
				} 
			}
			for(var i = 30;i<=35;i++){
				if(text == `$${i}/h`){
					var text = '$30-$35/h';
				} 
			}
			for(var i = 35;i<=40;i++){
				if(text == `$${i}/h`){
					var text = '$35-$40/h';
				} 
			}
			for(var i = 40;i<=45;i++){
				if(text == `$${i}/h`){
					var text = '$40-$45/h';
				} 
			}
			for(var i = 45;i<=50;i++){
				if(text == `$${i}/h`){
					var text = '$45-$50/h';
				} 
			}
			for(var i = 50;i<=60;i++){
				if(text == `$${i}/h`){
					var text = '$50-$60/h';
				} 
			}
			for(var i = 60;i<=70;i++){
				if(text == `$${i}/h`){
					var text = '$60-$70/h';
				} 
			}
			for(var i = 70;i<=80;i++){
				if(text == `$${i}/h`){
					var text = '$70-$80/h';
				} 
			}
			for(var i = 80;i<=90;i++){
				if(text == `$${i}/h`){
					var text = '$80-$90/h';
				} 
			}
			for(var i = 90;i<=100;i++){
				if(text == `$${i}/h`){
					var text = '$90-$100/h';
				} 
			}
			for(var i = 100;i<=200;i++){
				if(text == `$${i}/h`){
					var text = '$100-$200/h';
				} 
			}
			// ! workload
			for(var i = 1;i<=40;i++){
				if(text == `${i} h/mo`){
					var text = '1-40 h/mo';
				} 
			}
			for(var i = 40;i<=80;i++){
				if(text == `${i} h/mo`){
					var text = '40-80 h/mo';
				} 
			}
			for(var i = 80;i<=120;i++){
				if(text == `${i} h/mo`){
					var text = '80-120 h/mo';
				} 
			}
			for(var i = 120;i<=160;i++){
				if(text == `${i} h/mo`){
					var text = '120-160 h/mo';
				} 
			}
			for(var i = 160;i<=200;i++){
				if(text == `${i} h/mo`){
					var text = '160-200 h/mo';
				} 
			}
			for(var i = 200;i<=250;i++){
				if(text == `${i} h/mo`){
					var text = '200-250 h/mo';
				} 
			}
			// ! experience
			for(var i = 10;i<=50;i++){
				if(text == `${i} years`){
					var text = '10-50 years';
				} 
			}

			
			$('.search-icon').trigger('click');
	
				$(`.search-${search_id}`).val(`${text}`);
				post_filter_card();

				last_filter(text, search_id);
			
		})
})