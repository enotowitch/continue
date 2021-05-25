<?
	session_start();
	require_once "DB.php";

	$files = R::load('post', $_POST['card_id']);
?>

<input type="hidden" name="card_id" value="<? echo $_POST['card_id']; ?>">

<input type="hidden" name="title" value="<? echo $_POST['title']; ?>">
<input type="hidden" name="subt" value="<? echo $_POST['subt']; ?>">

<input type="hidden" name="salary" value="<? echo $_POST["salary"]; ?>">
<input type="hidden" name="duration" value="<? echo $_POST["duration"]; ?>">
<input type="hidden" name="experience" value="<? echo $_POST["experience"]; ?>">
<input type="hidden" name="workload" value="<? echo $_POST["workload"]; ?>">
<input type="hidden" name="location" value="<? echo $_POST["location"]; ?>">

<input type="hidden" name="tag_1" value="<? echo $_POST["tag_1"]; ?>">
<input type="hidden" name="tag_2" value="<? echo $_POST["tag_2"]; ?>">
<input type="hidden" name="tag_3" value="<? echo $_POST["tag_3"]; ?>">


<?
	include "post-form.php";
?>



<script>

// difference btw update-form & post-form
	$('.form-card:not(:first-child)').addClass('update-card').removeClass('not100').addClass('w100');

	var card_id = $('input[name="card_id"]').val();

	var title = $('input[name="title"]').val();
	var subt = $('input[name="subt"]').val();

	var salary = $('input[name="salary"]').val();
	var duration = $('input[name="duration"]').val();
	var experience = $('input[name="experience"]').val();
	var workload = $('input[name="workload"]').val();
	var loca = $('input[name="location"]').val();

	var tag_1 = $('input[name="tag_1"]').val();
	var tag_2 = $('input[name="tag_2"]').val();
	var tag_3 = $('input[name="tag_3"]').val();

	// ! vars insert

	$('.update-card').find('.user_id').before('<input class="card_id" name="card_id" type="hidden" value="'+card_id+'">');

	$('.update-card').find('textarea[name="title"]').text(`${title}`);
	$('.update-card').find('textarea[name="subt"]').text(`${subt}`);

	$('.update-card').find('select[name="salary"] option[value="0"]').prop("disabled", false).text(`${salary}`).val(`${salary}`);
	$('.update-card').find('select[name="duration"] option[value="0"]').prop("disabled", false).text(`${duration}`).val(`${duration}`);
	$('.update-card').find('select[name="experience"] option[value="0"]').prop("disabled", false).text(`${experience}`).val(`${experience}`);
	$('.update-card').find('select[name="workload"] option[value="0"]').prop("disabled", false).text(`${workload}`).val(`${workload}`);
	// location causes problems
	$('.update-card').find('select[name="location"] option[value="0"]').prop("disabled", false).text(`${loca}`).val(`${loca}`);

	$('.update-card').find('select[name="tags[]"] option').eq(0).attr('selected', 'true').text(`${tag_1}`).val(`${tag_1}`);
	$('.update-card').find('select[name="tags[]"] option').eq(1).attr('selected', 'true').text(`${tag_2}`).val(`${tag_2}`);
	$('.update-card').find('select[name="tags[]"] option').eq(2).attr('selected', 'true').text(`${tag_3}`).val(`${tag_3}`);

// ! ready
	$(document).ready(function(){

		$('.update-card').find('.cross_reset').after('<img class="del mba" src="img/icons/delete.svg" alt="del">');

		$('.update-card').find('select').chosen();
		// 
		$('.update-card').find('.chosen-single, .info__example').addClass('upd-info');
		// ! slick will take space so width = auto for now
		$('.update-card').find('.tags').addClass('upd-tags');
		// let it be .css
		$('.update-card').find('.info__block').css({"width": "100px"});

		$('.update-card').find('.cross_reset').on('click', function(){
			$(this).closest('.card-update').detach();
			$('.card').removeClass('op01');
			$('.post-block').detach();
		})

		// ! load examples + slick

		// ! diffs btw post-form & update-form
		$('.update-card').find('.fake-example').addClass('fake-example-upd');
		$('.update-card').find('[for="fake-example"]').attr('for', 'fake-example-upd');
		$('.update-card').find('.fake-example').attr('id', 'fake-example-upd');

		$('.update-card').find('.tags').addClass('tags_main').wrap('<div class="tags-pics-flex tpfupd"></div>');

		$('.update-card').find('.tags').after(`<div class="info__cell info__simple info__pics info__pics_preview"><img class="" src="<? echo $files["example_1"]; ?>" alt="1"><img class="" src="<? echo $files["example_2"]; ?>" alt="2"><img class="" src="<? echo $files["example_3"]; ?>" alt="3"><img class="" src="<? echo $files["example_4"]; ?>" alt="4"><img class="" src="<? echo $files["example_5"]; ?>" alt="5"><img class="" src="<? echo $files["example_6"]; ?>" alt="6"><img class="" src="<? echo $files["example_7"]; ?>" alt="7"><img class="" src="<? echo $files["example_8"]; ?>" alt="8"><img class="" src="<? echo $files["example_9"]; ?>" alt="9"><img class="" src="<? echo $files["example_10"]; ?>" alt="10"></div>`);

		// ! delete empty pics before slick init
		var empty_pic = $('img[src=""]');
		empty_pic.detach();
		
		$('.update-card').find('.info__pics').slick({
		lazyLoad: 'ondemand',
		infinite: false,
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



	})

	

	
</script>

