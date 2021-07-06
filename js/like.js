$(document).ready(function () {

	$(document).on('click', '.like', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();
		var card_from = $('.card_from').val();
		var cat = $('.cat').val();


		// ! links for anchors: added to liked & removed from liked
		if(card_from == '/index.php' || card_from == '/jobs-like.php' || card_from == '/jobs-del.php' || card_from == '/jobs-mes.php' || card_from == '/post-job.php'){
			var like_link = '/jobs-like.php';
		}
		if(card_from == '/portfolios.php' || card_from == '/port-like.php' || card_from == '/port-del.php' || card_from == '/port-mes.php' || card_from == '/post-portfolio.php'){
			var like_link = '/port-like.php';
		}

// ! log to like
		if(current_user == ""){
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Please <a class="brand" href="login.php">SIGN IN</a> or <a class="brand" href="reg.php">SIGN UP</a> to like<img src="img/icons/cross.svg"></div>');
			return;
		}

		var like = $(e.target).attr('src');

		// ! added to liked
		if(like == 'img/icons/like.svg'){
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Added to <a href="'+like_link+'"><span class="brand">liked</span></a><img src="img/icons/cross.svg"></div>');
		}
		// ! removed from liked
		if(like == 'img/icons/liked.svg'){
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Removed from <a href="'+like_link+'"><span class="brand">liked</span></a><img src="img/icons/cross.svg"></div>');
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
						$(this).addClass('db-liked');
					}
				})
			});
		}
	});

	// ! close please-log
	$(document).on('click', '.please-log img', function(){
		$('.please-log').detach();
	})

})

