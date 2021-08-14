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

	$(document).on('click', '.update', function (e) {

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
		}, 500);

		// ! add del icon to imgs in card update - SMALL CARD
		setTimeout(() => {
			$('.update-card').next('.post-preview').find('img').each(function () {
				$(this).before('<div class="upd_pic_del"><img class="upd_pic_del_img" src="img/icons/delete.svg"></div>');
			})
		}, 500);

	})






	$(document).on('click', '.upd_pic_del', function (e) {

		var pics_count = $(this).closest('.slick-track').find('.slick-slide').length;

		if(pics_count == 1){
			alert('Post must have at least 1 picture!');
			return;
		}

		if (confirm('Are you sure you want to delete this picture forever?')) {

			var index = $(this).next().attr('alt');
			var src = $(this).next('img').attr('src');


			$.post({
				url: 'update-imgs.php',
				data: ({ card_from: card_from, card_id: card_id, src: src, index: index }),
				success: function (data) {
					$(e.target).closest('.slick-slide').detach();
					$(document).find('.update-card').find('.info__example').text(`${pics_count-1}/10`);
				},
			})

		}


	})





})



