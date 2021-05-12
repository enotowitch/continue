$(document).ready(function () {

	$(document).on('click', '.like', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();

		$.post({
			'url': 'like.php',
			'data': { card_id: card_id },
			success: function () {
				$(e.target).attr('src', 'img/icons/liked.svg');
			}
		});
	})

	$.post({
		'url': 'liked.php',
		'dataType': 'json',
		success: function (data) {

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

