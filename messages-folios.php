<?
include_once "messages-applications.php";
?>




<script>
$('.apply').addClass('mes-to-applicant').removeClass('get-mes-form').attr('src', 'img/icons/email.svg');

$('.mes-to-applicant').on('click', function(){
	var user_from_id = $(this).closest('.card').find('.user_from_id').val();	
	window.location.href = `/mes.php?from=${user_from_id}`;
})


$('.search__topic:first-child()').addClass('search__topic_active').text('Applications').attr('href', '/messages.php');
$('.search__topic:last-child()').text('Messages').attr('href', '/messages2.php');

$('.search__topic:first-child()').eq(1).removeClass('search__topic_active').text('JOBS').attr('href', '/messages.php');
$('.search__topic:last-child()').eq(1).addClass('search__topic_active').text('PORTFOLIOS').attr('href', '/messages-folios.php');
</script>