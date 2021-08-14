$(document).ready(function () {

	$(document).on('click', '.hide', function(e){
		
		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();
		var card_from = $('.card_from').val();
		var cat = $('.cat').val();

				// ! links for anchors: added to hidden & removed from hidden
				if(card_from == '/index.php' || card_from == '/jobs-del.php' || card_from == '/jobs-like.php' || card_from == '/jobs-mes.php' || card_from == '/post-job.php'){
					var hide_link = '/jobs-del.php';
				}
				if(card_from == '/portfolios.php' || card_from == '/port-del.php' || card_from == '/port-like.php' || card_from == '/port-mes.php'){
					var hide_link = '/port-del.php';
				}

			// ! removed from hidden
		if(card_from == "/jobs-del.php" || card_from == "/port-del.php" || $(e.target).closest('.card').hasClass('db-hidden')){
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
				
			}
		});
		
	})

	render_hidden();

})

