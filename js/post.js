// ! post_job
var post_job = $('#post_job');


post_job.on('submit', function (e) {

	e.preventDefault();

	var title = $('.card__title').val();

	$.ajax({
		url: 'insert-job.php',
		type: 'POST',
		data: {
			title: title
		},
		// beforeSend: function () {
		// 	return confirm("Are you sure?");
		// },
		success: function () {
			window.location.href = 'index.php';
		}
	})
})

// ! post_portfolio

var post_portfolio = $('#post_portfolio');


post_portfolio.on('submit', function (e) {

	e.preventDefault();

	var title = $('.card__title').val();

	$.ajax({
		url: 'insert-portfolio.php',
		type: 'POST',
		data: {
			title: title
		},
		// beforeSend: function () {
		// 	return confirm("Are you sure?");
		// },
		success: function () {
			window.location.href = 'portfolios.php';
		}
	})
})