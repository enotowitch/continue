$(document).ready(function () {

	$(document).on('click', '.like', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();

		if(current_user == ""){
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Please <a class="brand" href="login.php">SIGN IN</a> or <a class="brand" href="reg.php">SIGN UP</a> to like</div>');
			return;
		}



		$.post({
			'url': 'like.php',
			'data': { card_id: card_id },
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
					}
				})
			});
		}
	});

})

