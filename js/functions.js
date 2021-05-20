function my_alert(color, text){

		$('.please-log').detach();

		$('body').before('<div class="please-log '+color+'">'+text+'<img src="img/icons/cross.svg"></div>');
		
}

var post = $('.post');

function post_hide(){
	$('.post-show').detach();
	post.before('<div class="burger__button post-show"><div class="burger__line"></div></div>');
	post.slideUp(600);
}

