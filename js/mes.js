$('.get-mes-form').on('click', function (e) {

	// delete other mes-forms
	$('.card-mes').detach();

	var user_to_id = $(e.target).closest('.card').find('.user_id').val();

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
$(document).on('click', '.card-mes-close', function(e){
	$(e.target).closest('.card-mes').detach();
})

// ! mes send
$(document).on('click', '.mes-send', function (e) {

	$.post({
		url: 'mes-send.php',
		data: $(e.target).closest('form').serialize(),
		success: function (data) {
			window.location.reload();
		},
	})



})