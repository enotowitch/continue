// ! add update icon to current_user_posts

var current_user = $('.current_user').val();
var current_user_posts = $('.user_id[value="' + current_user + '"]').closest('.card').not('.not100');
var card_from = $('.card_from').val();

if (card_from == '/post-job.php' || card_from == '/post-portfolio.php') {
	current_user_posts.find('.hide').after('<img class="update" src="img/icons/update.svg" alt="update">');
	current_user_posts.find('.hide').hide();
}

// ! ready

$(document).ready(function () {

	$('.update').on('click', function (e) {

		$('.card-update').detach();
		post_hide();

		$('.card').addClass('op01');
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
			data: ({card_id:card_id,title:title,subt:subt,salary:salary,duration:duration,experience:experience,workload:workload,location:location,tag_1:tag_1,tag_2:tag_2,tag_3:tag_3}),
			success: function (data) {
				$(e.target).closest('.card').prepend('<div class="card-update"></div>');
				$(e.target).closest('.card').find('.card-update').html(data);
			},
		})
	})




})



