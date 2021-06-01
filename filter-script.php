<!-- ! hidden -->

<? if ($_GET["filter"] == "hidden"): ?>


<script>

	$('.card-flex').prepend('<div class="w100 loading">Loading hidden...</div>');

	$('.filter').after('<div class="cancel-filter"><? echo $_GET["filter"]; ?><span class="close-cancel-filter"></span></div>');

	// ! ready
$(document).ready(function(){
	setTimeout(() => {
		$('.card').not('.form-card').not('.card2').addClass('dn');
		$('.db-hidden').removeClass('dn');
		$('.info__pics').slick('unslick');
	}, 500);

	

	setTimeout(() => {
		$('.info__pics').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
			{
				breakpoint: 650,
				settings: {
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 550,
				settings: {
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
		]
	});

	$('.loading').detach();

	}, 500);
	
	
	$('.cancel-filter').on('click', function(){

	var without_filter = window.location.href.replace('&filter=hidden', '');
	window.location.href = without_filter;

})

})

</script>

<? endif; ?>


<!-- ! liked -->
<? if($_GET["filter"] == "liked"): ?>

<script>

$('.card-flex').prepend('<div class="w100 loading">Loading liked...</div>');

$('.filter').after('<div class="cancel-filter"><? echo $_GET["filter"]; ?><span class="close-cancel-filter"></span></div>');

	// ! ready
$(document).ready(function(){
	setTimeout(() => {
		$('.card').not('.form-card').not('.card2').addClass('dn');
		$('.db-liked').removeClass('dn');
		$('.info__pics').slick('unslick');
	}, 500);

	

	setTimeout(() => {
		$('.info__pics').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
			{
				breakpoint: 650,
				settings: {
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 550,
				settings: {
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
		]
	});

	$('.loading').detach();

	}, 500);
	
	
	$('.cancel-filter').on('click', function(){

	var without_filter = window.location.href.replace('&filter=liked', '');
	window.location.href = without_filter;

})

})

</script>

<? endif; ?>


<!-- ! messaged -->
<? if($_GET["filter"] == "messaged"): ?>

<script>

$('.card-flex').prepend('<div class="w100 loading">Loading messaged...</div>');

$('.filter').after('<div class="cancel-filter"><? echo $_GET["filter"]; ?><span class="close-cancel-filter"></span></div>');

	// ! ready
$(document).ready(function(){
	setTimeout(() => {
		$('.card').not('.form-card').not('.card2').addClass('dn');
		$('.db-messaged').removeClass('dn');
		$('.info__pics').slick('unslick');
	}, 500);

	

	setTimeout(() => {
		$('.info__pics').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
			{
				breakpoint: 650,
				settings: {
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 550,
				settings: {
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
		]
	});

	$('.loading').detach();

	}, 500);
	
	
	$('.cancel-filter').on('click', function(){

	var without_filter = window.location.href.replace('&filter=messaged', '');
	window.location.href = without_filter;

})

})

</script>

<? endif; ?>