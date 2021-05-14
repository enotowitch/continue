$(document).ready(function () {

	$('.del').on('click', function (e) {

		var card_id = $(this).closest('.card').find('.card_id').val();
		var card_from = $(this).closest('.card').find('.card_from').val();
		var current_user = $('.current_user').val();

		if (current_user == "") {
			alert('no current_user');
			return;
		} else {

			$.ajax({
				url: 'delete.php',
				type: 'POST',
				data: {
					card_id: card_id,
					card_from: card_from
				},
				// beforeSend: function () {
				// 	return confirm("Are you sure?");
				// },
				success: function () {

					$(e.target).closest('.card').append('<div class="del-anim"></div>');
					$('.del-anim').animate({ 'width': '100%' });
					setTimeout(() => {
						$(e.target).closest('.card').hide();
					}, 600);

				}
			})

		}


	})
})