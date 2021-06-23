$(document).ready(function () {

	$(document).on('click', '.hide', function(e){
		
		var card_id = $(this).closest('.card').find('.card_id').val();
		var current_user = $('.current_user').val();
		var card_from = $('.card_from').val();

				// ! links for anchors: added to hidden & removed from hidden
				if(card_from == '/index.php' || card_from == '/jobs-del.php' || card_from == '/jobs-like.php' || card_from == '/jobs-mes.php' || card_from == '/post-job.php'){
					var hide_link = '/jobs-del.php';
				}
				if(card_from == '/portfolios.php' || card_from == '/port-del.php' || card_from == '/port-like.php' || card_from == '/port-mes.php'){
					var hide_link = '/port-del.php';
				}

			// ! removed from hidden
		if(card_from == "/jobs-del.php" || card_from == "/port-del.php" || $(e.target).closest('.card').hasClass('db-hidden')){
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">removed from <a href="'+hide_link+'"><span class="brand">hidden</span></a><img src="img/icons/cross.svg"></div>');
		} else {
			// !!! added to hidden	
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Added to <a href="'+hide_link+'"><span class="brand">hidden</span></a><img src="img/icons/cross.svg"></div>');
		}

		

		// ! log to hide
		if(current_user == ""){
			$('.please-log').detach();
			$(e.target).closest('.card').before('<div class="please-log">Please <a class="brand" href="login.php">SIGN IN</a> or <a class="brand" href="reg.php">SIGN UP</a> to hide<img src="img/icons/cross.svg"></div>');
			return;
		}


		


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

	// ! hide posts on all pages except: jobs-del or port-del
	$.post({
		'url': 'hidden.php',
		'dataType': 'json',
		success: function (data) {

			// ! load hidden from DB
			data.forEach(element => {

				$('.card').each(function () {

					var id = $(this).find('.card_id').val();

					if (id == element) {
					
						$(this).addClass('db-hidden');
							// if cards are on jobs-del or port-del -> show
						if(card_from == '/jobs-del.php' || card_from == '/port-del.php'){
							// $(this).addClass('db');
						}
						
					}
				})
			});
		}
	});

})

