$(document).ready(function () {
	$('.user-form').on('submit', function (e) {

		e.preventDefault();

		$.post({
			url: 'auth.php',
			data: $(this).serialize(),
			success: function () {
				alert('555');
				// window.location.href = 'auth.php';
			},
		})
	})
})