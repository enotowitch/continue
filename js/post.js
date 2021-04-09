// ! post form_card (2)
var form_card = $('.form-card');


form_card.on('submit', function (e) {

	var card_from = $(this).closest('.card').find('.card_from').val();

	e.preventDefault();


	$.ajax({
		url: 'insert.php',
		type: 'POST',
		data: $(this).serialize(),
		// beforeSend: function () {
		// 	return confirm("Are you sure?");
		// },
		success: function () {
			if (card_from == '/post-job.php') {
				window.location.href = 'index.php';
			}
			if (card_from == '/post-portfolio.php') {
				window.location.href = 'portfolios.php';
			}
		}
	})
})

// ! 
