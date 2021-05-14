$(document).ready(function () {

	$('.get-mes-form').on('click', function (e) {

		// ! to pass card_id to mes-form-form to show posts that user messaged
		$('.get-mes-form').removeClass('clicked');
		$(this).addClass('clicked');

		// ! delete other mes-forms
		$('.card-mes').detach();

		var user_to_id = $(e.target).closest('.card').find('.user_id').val();
		var current_user = $(e.target).closest('.card').find('.current_user').val();

		// ! log to message
		if (current_user == "") {
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Please <a class="brand" href="login.php">SIGN IN</a> or <a class="brand" href="reg.php">SIGN UP</a> to message<img src="img/icons/cross.svg"></div>');
			return;
		}

		// ! cannt message to yourself
		if (user_to_id == current_user) {
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">You can not message yourself<img src="img/icons/cross.svg"></div>');
			return;
		}


		// ! load form to card
		$.post({
			url: 'mes-form.php',
			data: ({ user_to_id: user_to_id }),
			success: function (data) {
				$(e.target).closest('.card').prepend('<div class="card-mes"></div>');
				$(e.target).closest('.card').find('.card-mes').html(data);
			},
		})
	})

	// ! delete(close) mes-form from card
	$(document).on('click', '.card-mes-close', function (e) {
		$(e.target).closest('.card-mes').detach();
	})

	// ! mes send
	$(document).on('click', '.mes-send', function (e) {

		var card_from = $('.card_from').val();

		// ! links for anchors: mes_link
		if (card_from == '/index.php' || card_from == '/jobs-like.php' || card_from == '/jobs-del.php' || card_from == '/jobs-mes.php') {
			var mes_link = '/jobs-mes.php';
		}

		if (card_from == '/portfolios.php' || card_from == '/port-like.php' || card_from == '/port-del.php' || card_from == '/port-mes.php') {
			var mes_link = '/port-mes.php';
		}

		$.post({
			url: 'mes-send.php',
			data: $(e.target).closest('form').serialize(),
			success: function (data) {
				$(e.target).closest('.card-mes').detach();

				var card_from = window.location.href;

				// ! if card_from -> mes.php (messages) -> don't show - notification(please-log)
				if (!card_from.includes('/mes.php')) {
					// ! Added to messaged
					$('.please-log').detach();

					$('body').before('<div class="please-log">Message sent<br>Added to <a class="brand" href="' + mes_link + '">messaged</a><br><a class="brand" href="/messages.php">All messages</a><img src="img/icons/cross.svg"></div>');
				} else {
					// ! if card_from -> mes.php -> reload
					location.reload();
				}



			},
		})


	})

	// ! ajax to mesd.php - to store mesd


	$(document).on('click', '.mes-send', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();


		$.post({
			url: 'mesd.php',
			data: { card_id: card_id },
			success: function (data) {
				// alert('stored to mesd.php');
			},
		})


	})




})

