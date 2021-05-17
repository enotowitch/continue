function my_alert(color, text){

		$('.please-log').detach();

		$('body').before('<div class="please-log '+color+'">'+text+'<img src="img/icons/cross.svg"></div>');
		
}



