<? if($_SERVER['PHP_SELF'] == '/index.php' || $_SERVER['PHP_SELF'] == '/portfolios.php'): ?>
<script>
if($('.card-flex').find('.card').length == 0){
	(window.location.href.includes('?')) ? hidden = window.location.href.replace(/filter.*?&/, '')+'filter=hidden&' : hidden = window.location.href.replace(/filter.*?&/, '')+'?'+'filter=hidden&';
	(window.location.href.includes('?')) ? applied = window.location.href.replace(/filter.*?&/, '')+'filter=applied&' : applied = window.location.href.replace(/filter.*?&/, '')+'?'+'filter=applied&';
	$('.card-flex').append('<div class="check-no-post-div"><p>No posts?</p></div>');
	$('.check-no-post-div').append(`<div class="check-no-post">Check <a href="${hidden}" class="danger tdu">hidden</a> posts </div>`);
	$('.check-no-post-div').append(`<div class="check-no-post">Check <a href="${applied}" class="brand tdu">applied</a> posts </div>`);	
	}
</script>
<? endif; ?>




<? if($_SERVER['PHP_SELF'] == '/post-job.php' || $_SERVER['PHP_SELF'] == '/post-portfolio.php'): ?>
<script>
	if($('.card-flex').find('.card').length == 0){
	$('.card-flex').append('<div class="check-no-post-div"></div>');
	$('.check-no-post-div').append(`<div class="check-no-post"><b>Add</b> a post and <b>edit</b> it here</div>`);
	}
</script>
<? endif; ?>




<? if($_SERVER['PHP_SELF'] == '/messages.php' || $_SERVER['PHP_SELF'] == '/messages-folios.php'): ?>
<script>
	if($('.card-flex').find('.card').length == 0){
	$('.card-flex').append('<div class="check-no-post-div"></div>');
	$('.check-no-post-div').append(`<div class="check-no-post">You will see <b>incoming applications here</b> when somebody <b>apply</b> to your post</div>`);
	}
</script>
<? endif; ?>