$('.mes-form').on('click', function (e) {

	var user_to_id = $(e.target).closest('.card').find('.user_id').val();

	// load form to card
	$.post({
		url: 'mes-form.php',
		data: ({ user_to_id: user_to_id }),
		success: function (data) {
			$(e.target).closest('.card').html(data);
		},
	})
})

$(document).on('click', '.mes-send', function (e) {

	$.post({
		url: 'mes-send.php',
		data: $(e.target).closest('form').serialize(),
		success: function (data) {
			window.location.reload();
		},
	})


})