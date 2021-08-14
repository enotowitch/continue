<?
	session_start();
	require_once "DB.php";


	$files = R::load('post', $_POST['card_id']);

	
?>

<!-- must be here to have some content -->
<input type="hidden" name="card_id" value="<? echo $_POST["card_id"]; ?>">

<?
	include "post-form.php";
?>



<script>
// ! ready
	$(document).ready(function(){

		// difference btw update-form & post-form
		$('.form-card:not(:first-child)').addClass('update-card').removeClass('not100');

		// ! $_POST insert

		$('.update-card').find('.user_id').before('<input class="card_id" name="card_id" type="hidden" value="<? echo $_POST['card_id']; ?>">');
			
		$('.update-card').find('textarea[name="title"]').text(`<? echo $_POST['title']; ?>`);
		$('.update-card').find('textarea[name="subt"]').text(`<? echo $_POST['subt']; ?>`);
			
		$('.update-card').find('select[name="salary"] option[value="0"]').prop("disabled", false).text(`<? echo $_POST["salary"]; ?>`).val(`<? echo $_POST["salary"]; ?>`);
		$('.update-card').find('select[name="duration"] option[value="0"]').prop("disabled", false).text(`<? echo $_POST["duration"]; ?>`).val(`<? echo $_POST["duration"]; ?>`);
		$('.update-card').find('select[name="experience"] option[value="0"]').prop("disabled", false).text(`<? echo $_POST["experience"]; ?>`).val(`<? echo $_POST["experience"]; ?>`);
		$('.update-card').find('select[name="workload"] option[value="0"]').prop("disabled", false).text(`<? echo $_POST["workload"]; ?>`).val(`<? echo $_POST["workload"]; ?>`);
		$('.update-card').find('select[name="location"] option[value="0"]').prop("disabled", false).text(`<? echo $_POST["location"]; ?>`).val(`<? echo $_POST["location"]; ?>`);
			
		$('.update-card').find('select[name="tags[]"] option').eq(0).attr('selected', 'true').text(`<? echo $_POST["tag_1"]; ?>`).val(`<? echo $_POST["tag_1"]; ?>`);
		$('.update-card').find('select[name="tags[]"] option').eq(1).attr('selected', 'true').text(`<? echo $_POST["tag_2"]; ?>`).val(`<? echo $_POST["tag_2"]; ?>`);
		$('.update-card').find('select[name="tags[]"] option').eq(2).attr('selected', 'true').text(`<? echo $_POST["tag_3"]; ?>`).val(`<? echo $_POST["tag_3"]; ?>`);


		$('.update-card').find('.cross_reset').after('<img class="del mba" src="img/icons/delete.svg" alt="del">');

		$('.update-card').find('select.info__cell').chosen();
		$('.update-card').find('select.tags__select').chosen({ max_selected_options: 3 });
		// 
		$('.update-card').find('.chosen-single, .info__example').addClass('upd-info');
		// ! slick will take space so width = auto for now
		$('.update-card').find('.tags').addClass('upd-tags');
		// let it be .css
		$('.update-card').find('.info__block').css({"width": "100px"});

		$('.update-card').find('.cross_reset').on('click', function(){
			$(this).closest('.card-update').detach();
			$('.card').removeClass('op01');
		})

		// ! load examples + slick

		// ! diffs btw post-form & update-form
		$('.update-card').find('[for="fake-example"]').attr('for', 'fake-example-upd');
		$('.update-card').find('.fake-example').attr('id', 'fake-example-upd');
		$('.update-card').find('.fake-example').addClass('fake-example-upd').removeClass('fake-example');

		$('.update-card').find('.tags').addClass('tags_main').wrap('<div class="tags-pics-flex tpfupd"></div>');

		// load logo from DB
		$('.update-card').find('.card__logo').before('<img class="card__logo card__logo_db" src="<? echo $files["logo"]; ?>">');
		$('.update-card').find('label.card__logo').addClass('op05');

		// !!! load pics from DB - BIG CARD
		if(!$('.update-card').closest('.w_small').hasClass('w_small')){

			$('.update-card').find('.tags').after(`<div class="info__cell info__simple info__pics info__pics_preview"><img src="<? echo $files["example_1"]; ?>" alt="1"><img src="<? echo $files["example_2"]; ?>" alt="2"><img src="<? echo $files["example_3"]; ?>" alt="3"><img src="<? echo $files["example_4"]; ?>" alt="4"><img src="<? echo $files["example_5"]; ?>" alt="5"><img src="<? echo $files["example_6"]; ?>" alt="6"><img src="<? echo $files["example_7"]; ?>" alt="7"><img src="<? echo $files["example_8"]; ?>" alt="8"><img src="<? echo $files["example_9"]; ?>" alt="9"><img src="<? echo $files["example_10"]; ?>" alt="10"></div>`);

		}

	
		// !!! load pics from DB - SMALL CARD
		if($('.update-card').closest('.w_small').hasClass('w_small')){

			$('.update-card').closest('.card').next('.post-preview').detach();
			$('.update-card').closest('.card').after('<div class="post-preview"></div>');
			$('.update-card').closest('.card').next('.post-preview').html(`<img src="<? echo $files["example_1"]; ?>" alt="1"><img src="<? echo $files["example_2"]; ?>" alt="2"><img src="<? echo $files["example_3"]; ?>" alt="3"><img src="<? echo $files["example_4"]; ?>" alt="4"><img src="<? echo $files["example_5"]; ?>" alt="5"><img src="<? echo $files["example_6"]; ?>" alt="6"><img src="<? echo $files["example_7"]; ?>" alt="7"><img src="<? echo $files["example_8"]; ?>" alt="8"><img src="<? echo $files["example_9"]; ?>" alt="9"><img src="<? echo $files["example_10"]; ?>" alt="10">`);

			setTimeout(() => {
				my_slick_3($('.update-card').closest('.card').next('.post-preview'));
				// count & show pics-count
				var pics_count = $('.update-card').closest('.card').next('.post-preview').find('.slick-slide').length;
				$('.update-card').closest('.card').find('.info__example').addClass('brand-bg').text(`${pics_count}/10`);
			}, 000);


		}

		// ! add del icon to imgs in card update - BIG CARD
		setTimeout(() => {
			$('.update-card').find('.info__pics').find('img').each(function () {
				$(this).before('<div class="upd_pic_del"><img class="upd_pic_del_img" src="img/icons/delete.svg"></div>');
			})
		}, 100);

		// ! add del icon to imgs in card update - SMALL CARD
		setTimeout(() => {
			$('.update-card').next('.post-preview').find('img').each(function () {
				$(this).before('<div class="upd_pic_del"><img class="upd_pic_del_img" src="img/icons/delete.svg"></div>');
			})
		}, 100);

		// ! delete empty pics before slick init
		var empty_pic = $('img[src=""]');
		empty_pic.detach();

			
		my_slick($('.update-card').find('.info__pics'));
		// count & show pics-count
		var pics_count = $('.update-card').closest('.card').find('.info__pics').find('.slick-slide').length;
		$('.update-card').closest('.card').find('.info__example').addClass('brand-bg').text(`${pics_count}/10`);

		// ! preview

		$('.update-card').find('.fake-logo').addClass('fake-logo-upd').removeClass('fake-logo');
		$('.update-card').find('[for="fake-logo"]').attr('for', 'fake-logo-upd');
		$('.update-card').find('.fake-logo-upd').attr('id','fake-logo-upd');

		$(document).on('change', '.fake-logo-upd', function (e) {

		$('.card__logo_db').detach();

		var preview = URL.createObjectURL(e.target.files[0]);
		$('.update-card').find('.card__logo_preview').detach();
		$('.update-card').find('label[for="fake-logo-upd"]').append('<img class="card__logo card__logo_preview" src="' + preview + '" alt="preview">');
		$('.update-card').find('label[for="fake-logo-upd"]').css({ 'border': 'none' });


		});

		// ! must be last - if user size db = w_small
		$('.w_small').find('.update-card').find('.chosen-single, .info__example').removeClass('upd-info');
		$('.w100').find('.update-card').addClass('w100');

	})

	

	
</script>

