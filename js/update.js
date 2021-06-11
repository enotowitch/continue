// ! add update icon to current_user_posts

var current_user = $('.current_user').val();
var current_user_posts = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100');
var card_from = $('.card_from').val();

if (card_from == '/post-job.php' || card_from == '/post-portfolio.php') {
	current_user_posts.find('.hide').after('<img class="update" src="img/icons/update.svg" alt="update">');
	current_user_posts.find('.hide').detach();
}

// ! ready

$(document).ready(function () {

	$('.update').on('click', function (e) {

		// close this slick pics when update
		$(this).closest('.card').find('.close-one-slick-pic').trigger('click');

		$('.card-update').detach();

		$('.card').not('.form-card').not('.card2').addClass('op01');
		$(e.target).closest('.card').removeClass('op01');

		var card_id = $(e.target).closest('.card').find('.card_id').val();

		var title = $(e.target).closest('.card').find('.card__title').text().trim();
		var subt = $(e.target).closest('.card').find('.card__subt').text().trim();

		// selects
		var salary = $(e.target).closest('.card').find('.salary').text().trim();
		var duration = $(e.target).closest('.card').find('.duration').text().trim();
		var experience = $(e.target).closest('.card').find('.experience').text().trim();
		var workload = $(e.target).closest('.card').find('.workload').text().trim();
		var location = $(e.target).closest('.card').find('.location').text().trim();

		// tags
		var tag_1 = $(e.target).closest('.card').find('.tags').find('.tag').eq(0).text().trim();
		var tag_2 = $(e.target).closest('.card').find('.tags').find('.tag').eq(1).text().trim();
		var tag_3 = $(e.target).closest('.card').find('.tags').find('.tag').eq(2).text().trim();





		// ! load update form to card
		$.post({
			url: 'update-form.php',
			data: ({ card_from: card_from, card_id: card_id, title: title, subt: subt, salary: salary, duration: duration, experience: experience, workload: workload, location: location, tag_1: tag_1, tag_2: tag_2, tag_3: tag_3 }),
			success: function (data) {
				$(e.target).closest('.card').prepend('<div class="card-update"></div>');
				$(e.target).closest('.card').find('.card-update').html(data);
			},
		})


		// ! add del icon to imgs in card update - BIG CARD
		setTimeout(() => {
			$('.update-card').find('.info__pics').find('img').each(function () {
				$(this).before('<div class="upd_pic_del"><img class="upd_pic_del_img" src="img/icons/delete.svg"></div>');
			})
		}, 300);

		// ! add del icon to imgs in card update - SMALL CARD
		setTimeout(() => {
			$('.update-card').next('.post-preview').find('img').each(function () {
				$(this).before('<div class="upd_pic_del"><img class="upd_pic_del_img" src="img/icons/delete.svg"></div>');
			})
		}, 800);

	})






	$(document).on('click', '.upd_pic_del', function (e) {

		if (confirm('Are you sure you want to delete this picture forever?')) {

			var index = $(this).next().attr('alt');
			var src = $(this).next('img').attr('src');

			$.post({
				url: 'update-imgs.php',
				data: ({ card_from: card_from, card_id: card_id, src: src, index: index }),
				success: function (data) {
					$(e.target).closest('.slick-slide').detach();
				},
			})

		}


	})

	// ! multiple PREVIEW 

	$(function () {
		// Multiple images preview in browser
		var imagesPreview = function (input, placeToInsertImagePreview) {

			if (input.files) {
				var filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
					var reader = new FileReader();

					reader.onload = function (event) {
						$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
					}

					reader.readAsDataURL(input.files[i]);
				}
			}

		};

		// ! update preview big

		$(document).on('change', '.fake-example-upd', function (e) {

			var filesAmount = this.files.length;
			
			if(filesAmount > 10){
				$(this).closest('.card').find('.info__example').addClass('red').text('10 files max!');
				return;
			}
			if(filesAmount <= 10){
				$(this).closest('.card').find('.info__example').removeClass('red').addClass('brand-bg').text(`${filesAmount}/10`);
			}

			// ! update preview small
			if($(this).closest('.w_small').hasClass('w_small')){
				
			$(this).closest('.card').next('.post-preview').detach();
			$(this).closest('.card').after('<div class="post-preview"></div>');


			imagesPreview(this, $(this).closest('.card').next('.post-preview'));


			setTimeout(() => {
				my_slick_3($(this).closest('.card').next('.post-preview'));
			}, 500);

			}


			$(e.target).closest('.card').find('.info__pics').slick('unslick');
			$(e.target).closest('.update-card').find('.info__pics').empty();


			imagesPreview(this, 'div.info__pics_preview');


			setTimeout(() => {

				var info__pics = $(e.target).closest('.card').find('.info__pics');
				my_slick(info__pics);

			}, 500);


		});


		// ! post preview small

		$(document).on('change', '.fake-example', function (e) {

			var filesAmount = this.files.length;
			
			if(filesAmount > 10){
				$(this).closest('.card').find('.info__example').addClass('red').text('10 files max!');
				return;
			}
			if(filesAmount <= 10){
				$(this).closest('.card').find('.info__example').removeClass('red').addClass('brand-bg').text(`${filesAmount}/10`);
			}


			$(this).closest('.card').next('.post-preview').detach();
			$(this).closest('.card').after('<div class="post-preview"></div>');


			imagesPreview(this, $(this).closest('.card').next('.post-preview'));


			setTimeout(() => {
				my_slick_3($(this).closest('.card').next('.post-preview'));
			}, 500);
			

		});



	});




})



