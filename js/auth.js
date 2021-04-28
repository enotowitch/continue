$(document).ready(function () {
	$('.user-form').on('submit', function (e) {

		e.preventDefault();

		var user_form_from = $('input[name="user_form_from"]').val();


		$.post({
			url: 'auth.php',
			dataType: 'json',
			data: $(this).serialize(),
			success: function (data) {
				if (data.status == false) {
					$('input[type="submit"]').addClass('red').val(data.msg);
					data.field.forEach(field => {
						$(`input[name="${field}"]`).addClass('red-b');
					});
					setTimeout(() => {
						$('input[name*="user"]').removeClass('red-b');
						if (user_form_from == '/reg.php') {
							$('input[type="submit"]').removeClass('red').val("SIGN UP");
						} else {
							$('input[type="submit"]').removeClass('red').val("SIGN IN");
						}
					}, 600);
				}
				if(data.status == true){
					$('input[type="submit"]').val(data.msg);
					setTimeout(() => {
						window.history.back();
					}, 600);
				}
				
			},
		})
	})
})