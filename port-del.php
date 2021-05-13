<? 
include "profile-header.php"; 
?>

<? 
include "footer.php"; 
?>


<script>$(document).ready(function(){
	$('.change-page').after('<div class="your flex-sb"><a href="port-del.php"><img class="prof-del" src="img/icons/delete.svg"></a><a href="port-like.php"><img class="prof-like" src="img/icons/liked.svg"></a><a href="port-mes.php"><img src="img/icons/apply.svg"></a></div>');
	$('.search__topic:last-child()').addClass('search__topic_active');
	$('.prof-del').after('<div class="bor-del"></div>');
})</script>