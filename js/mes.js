$('.get-mes-form').on('click', function (e) {

	// delete other mes-forms
	$('.card-mes').detach();

	var user_to_id = $(e.target).closest('.card').find('.user_id').val();
	var current_user = $(e.target).closest('.card').find('.current_user').val();

	// cannt message
	if(current_user == ""){
		$('.please-log').detach();
		$(e.target).closest('.card').before('<div class="please-log">Please <a class="brand" href="login.php">SIGN IN</a> or <a class="brand" href="reg.php">SIGN UP</a> to message<img src="img/icons/cross.svg"></div>');
		return;
	}

// cannt message to your self
	if(user_to_id == current_user){
		$('.please-log').detach();
		$(e.target).closest('.card').before('<div class="please-log">You can not message your self<img src="img/icons/cross.svg"></div>');
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