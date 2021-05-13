$(document).ready(function () {

	$('.hide').on('click', function(e){
		
		var card_id = $(this).closest('.card').find('.card_id').val();


		$.post({
			'url': 'hide.php',
			'data': { card_id: card_id },
			success: function () {

				$(e.target).closest('.card').append('<div class="del-anim"></div>');
				$('.del-anim').animate({ 'width': '100%' });
				setTimeout(() => {
					$(e.target).closest('.card').hide();
				}, 600);
				
			}
		});
		
	})

	var card_from = $('.card_from').val();

	$.post({
		'url': 'hidden.php',
		'dataType': 'json',
		success: function (data) {

			// ! load hidden from DB
			data.forEach(element => {

				$('.card').each(function () {

					var id = $(this).find('.card_id').val();

					if (id == element) {
					
						$(this).hide();
							// if cards are on jobs-del or port-del -> show
						if(card_from == '/jobs-del.php' || card_from == '/port-del.php'){
							$(this).show();
						}
						
					}
				})
			});
		}
	});

})

