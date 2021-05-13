<? 
include "profile-header.php"; 
?>

<? 
include "footer.php"; 
?>

<script>$(document).ready(function(){
	$('.change-page').after('<div class="your flex-sb"><a href="jobs-del.php"><img class="prof-del" src="img/icons/delete.svg"></a><a href="jobs-like.php"><img class="prof-like" src="img/icons/liked.svg"></a><a href="jobs-mes.php"><img class="prof-mes" src="img/icons/apply.svg"></a></div>');
	$('.search__topic:first-child()').addClass('search__topic_active');
	$('.prof-mes').after('<div class="bor-mes"></div>');
})</script>
