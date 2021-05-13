<? 
include "profile-header.php"; 
?>
<? 
include "db-like.php";
?>

<? 
include "footer.php";
?>

<script>$(document).ready(function(){
	$('.change-page').after('<div class="your flex-sb"><a href="jobs-del.php"><img src="img/icons/delete.svg"></a><a href="jobs-like.php"><img class="prof-like" src="img/icons/liked.svg"></a><a href="jobs-mes.php"><img src="img/icons/apply.svg"></a></div>');
	$('.search__topic:first-child()').addClass('search__topic_active');
	$('.prof-like').after('<div class="bor-like"></div>');

	var cards_count = $('.card-flex').find('.card');
	if(cards_count.length == 0){
		$('.card-flex').after('<div class="no-hist">No liked <a href="/">jobs</a></div>');
	}
})</script>