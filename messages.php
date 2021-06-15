<?
include_once "messages-applications.php";
?>




<script>



$('.search__topic:first-child()').addClass('search__topic_active').text('Applications').attr('href', '/messages.php');
$('.search__topic:last-child()').text('Messages').attr('href', '/messages2.php');


$('.search__topic:first-child()').eq(1).addClass('search__topic_active').text('JOBS').attr('href', '/messages.php');
$('.search__topic:last-child()').eq(1).text('PORTFOLIOS').attr('href', '/messages-folios.php');




</script>