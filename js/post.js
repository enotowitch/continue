// ! post form_card (2)
var form_card = $('.form-card');


form_card.on('submit', function (e) {

	e.preventDefault();


	var title_val = form_card.find('textarea[name="title"]').val().replace(/\s+/g, '').trim();
	var subt_val = form_card.find('textarea[name="subt"]').val().replace(/\s+/g, '').trim();

	var title = form_card.find('textarea[name="title"]');
	var subt = form_card.find('textarea[name="subt"]');

	// ! validation
	$('.please-log').detach();

	// Title
	if (title_val.length <= 3) {
		my_alert("brand-del", "Title should have more than 3 chars!");
		title.addClass('red-b');
		throw new Error("error from title");
	} else {
		title.removeClass('red-b');
	}
	// Subtitle
	if (subt_val.length <= 3) {
		my_alert("brand-del", "Subtitle should have more than 3 chars!");
		subt.addClass('red-b');
		throw new Error("error from subt");
	} else {
		subt.removeClass('red-b');
	}

	// selects
	// next() = .chosen-container -> select is hidden by chosen-JQ
	form_card.find('select').each(function () {
		if ($(this).val() == null) {

			var name = this.name;

			$(this).next().addClass('red-b-chosen');
			my_alert("brand-del", `Please select ${name}!`);

			throw new Error("error from each select");

		} else {
			$(this).next().removeClass('red-b-chosen');
		}
	});

	// tags
	var tags_count = form_card.find('.tags__select :selected');

	if (tags_count.length < 3) {
		my_alert("brand-del", "Please choose 3 tags!");
		form_card.find('.chosen-choices').addClass('red-b-chosen');
		throw new Error("error from tags");
	} else {
		form_card.find('.chosen-choices').removeClass('red-b-chosen');
	}


	// for success
	var card_from = $('.card_from').val();

	var fd = new FormData();

	var logo = $('.fake-logo').prop('files')[0];
	fd.append("logo", logo);

	var file_data = $('input[type="file"]')[1].files; // for multiple files
	for (var i = 0; i < file_data.length; i++) {
		fd.append("example_" + (i + 1), file_data[i]);
	}

	var other_data = $('form').serializeArray();

	// ! form_card -> title + subt TEXT FORMAT
	for (var i = 2; i <= 3; i++) {
		other_data[i].value = other_data[i].value.toLowerCase().replace(/\s+/g, ' ').trim();
		other_data[i].value = other_data[i].value[0].toUpperCase() + other_data[i].value.slice(1);
	}



	$.each(other_data, function (key, input) {
		fd.append(input.name, input.value);
	});



	$.post({
		url: 'insert.php',
		data: fd,
		processData: false,
		contentType: false,
		// beforeSend: function () {
		// 	return confirm("Are you sure?");
		// },
		success: function () {

			$(e.target).append('<div class="post-anim"></div>');

			$('.post-anim').animate({ 'width': '100%' }, 300);

			setTimeout(() => {

				if (card_from == '/post-job.php') {
					window.location.href = 'index.php';
				}
				if (card_from == '/post-portfolio.php') {
					window.location.href = 'portfolios.php';
				}

			}, 300);




		}
	});



})

// ! 
// ! 
// ! 

//  serializeArray = разбить на строки и назначить перем для отправки через FORMdata

// https://overcoder.net/q/28340/%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D1%82%D1%8C-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D0%B5-formdata-%D0%B8-string-%D0%B2%D0%BC%D0%B5%D1%81%D1%82%D0%B5-%D1%87%D0%B5%D1%80%D0%B5%D0%B7-jquery-ajax
// https://www.internet-technologies.ru/articles/5-primerov-ispolzovaniya-funkcii-jquery-each.html

// var fd = new FormData();
// var file_data = $('input[type="file"]')[0].files; // for multiple files
// for(var i = 0;i<file_data.length;i++){
// 	 fd.append("file_"+i, file_data[i]);
// }
// var other_data = $('form').serializeArray();
// $.each(other_data,function(key,input){
// 	 fd.append(input.name,input.value);
// });
// $.ajax({
// 	 url: 'test.php',
// 	 data: fd,
// 	 contentType: false,
// 	 processData: false,
// 	 type: 'POST',
// 	 success: function(data){
// 		  console.log(data);
// 	 }
// });

// https://stackoverflow.com/questions/11740231/how-to-concatenate-php-variable-name
	// https://www.php.net/manual/ru/language.variables.variable.php


	// ${"check" . $counter} = "some value";


// 	You can also create new variables in a loop:
// <?php

// for( $i = 1; $i < 6; $i++ )
// {
// $var_name[] = "new_variable_" . $i; //$var_name[] will hold the new variable NAME
// }

// ${$var_name[0]}  = "value 1"; //Value of $new_variable_1 = "value 1"
// ${$var_name[1]}  = "value 2"; //Value of $new_variable_2 = "value 2"
// ${$var_name[2]}  = "value 3"; //Value of $new_variable_3 = "value 3"
// ${$var_name[3]}  = "value 4"; //Value of $new_variable_4 = "value 4"
// ${$var_name[4]}  = "value 5"; //Value of $new_variable_5 = "value 5"

// echo "VARIABLE: " . $var_name[0] . "\n";
// echo "<br />";
// echo "VALUE: " . ${$var_name[0]};
// ?>

// The OUTPUT is:
// VARIABLE: new_variable_1
// VALUE: value 1

// ! PHP

// $user_from_logo = R::getAll( 'SELECT logo FROM post WHERE user_id = :user_id',
// [':user_id' => $_SESSION["user"]["id"]]
// );