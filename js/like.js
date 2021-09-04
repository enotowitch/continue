$(document).ready(function () {

	render_liked();

	$(document).on('click', '.like', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();
		var card_from = $('.card_from').val();
		var cat = $(this).closest('.card').find('.cat').val();

		// ! log to like
		if (current_user == "") {
			my_alert_login('like-color', 'like');
			return;
		}

		var like = $(e.target).attr('src');

		// ! added to liked
		if (like == 'img/icons/like.svg') {
			my_alert_filter('Added to', 'liked', 'like-color', 'filter=liked&');
		}
		// ! removed from liked
		if (like == 'img/icons/liked.svg') {
			my_alert_filter('Removed from', 'liked', 'like-color', 'filter=liked&');
		}

		$.post({
			'url': 'like.php',
			'data': { card_id: card_id, cat: cat },
			success: function () {

				var remove_like = $(e.target).attr('src');

				// ! add/remove like
				if (remove_like == 'img/icons/liked.svg') {
					$(e.target).attr('src', 'img/icons/like.svg');
				} else {
					$(e.target).attr('src', 'img/icons/liked.svg');
				}


			}
		});
	})

	// ! close my-alert
	$(document).on('click', '.my-alert img', function () {
		$('.my-alert').find('.my-alert__bg').animate({ 'margin-left': '97%', 'width': '100%' }, 400);
		$('.my-alert').animate({ 'opacity': '0' }, 800);
		setTimeout(() => {$('.my-alert').detach();}, 800);
	})

})

