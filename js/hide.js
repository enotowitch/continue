$(document).ready(function () {

	$(document).on('click', '.hide', function(e){
		
		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();
		var card_from = $('.card_from').val();
		var cat = $('.cat').val();
		var new_counter = $(document).find('.cancel_all_filters').text().replace(/\D/g,'');

			// ! removed from hidden
		if($(e.target).closest('.card').hasClass('db-hidden')){
			my_alert_filter('Removed from', 'hidden', 'danger', 'filter=hidden&');
		} else {
			// !!! added to hidden	
			my_alert_filter('Added to', 'hidden', 'danger', 'filter=hidden&');
		}

		

		// ! log to hide
		if(current_user == ""){
			my_alert_login('danger', 'hide');
			return;
		}


		


		$.post({
			'url': 'hide.php',
			'data': { card_id: card_id, cat:cat },
			success: function () {

				$(e.target).closest('.card').append('<div class="del-anim"></div>');
				$('.del-anim').animate({ 'width': '100%' });
				setTimeout(() => {
					$(e.target).closest('.card').hide();
				}, 600);
				
				// ! change result counter
				$('.cancel_all_filters').text(`cancel results: ${new_counter - 1}`);

			}
		});
		
	})

	render_hidden();

})

