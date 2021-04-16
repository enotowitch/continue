$(document).ready(function () {
	$('.user-form').on('submit', function (e) {

		e.preventDefault();

		$.post({
			url: 'auth.php',
			data: $(this).serialize(),
			success: function () {
				window.location.href = 'index.php';
			},
		})
	})
})