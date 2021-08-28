$(document).ready(function () {

	$(document).on('click', '.like', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();
		var card_from = $('.card_from').val();
		var cat = $(this).closest('.card').find('.cat').val();

// ! log to like
		if(current_user == ""){
			my_alert_login('like-color', 'like');
			return;
		}

		var like = $(e.target).attr('src');

		// ! added to liked
		if(like == 'img/icons/like.svg'){
			my_alert_filter('Added to', 'liked', 'like-color', 'filter=liked&');
		}
		// ! removed from liked
		if(like == 'img/icons/liked.svg'){
			my_alert_filter('Removed from', 'liked', 'like-color', 'filter=liked&');
		}

		$.post({
			'url': 'like.php',
			'data': { card_id: card_id, cat:cat },
			success: function () {

				var remove_like = $(e.target).attr('src');

				// ! add/remove like
				if(remove_like == 'img/icons/liked.svg'){
					$(e.target).attr('src', 'img/icons/like.svg');
				} else {
					$(e.target).attr('src', 'img/icons/liked.svg');
				}

				
			}
		});
	})

	render_liked();

	// ! close please-log
	$(document).on('click', '.please-log img', function(){
		$('.please-log').detach();
	})

})

