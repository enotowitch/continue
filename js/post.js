// ! post form_card (2)
var form_card = $('.form-card');


form_card.on('submit', function (e) {

	e.preventDefault();

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
			if (card_from == '/post-job.php') {
				window.location.href = 'index.php';
			}
			if (card_from == '/post-portfolio.php') {
				window.location.href = 'portfolios.php';
			}
		}
	});



})

// ! 
// ! 
// ! 

// // todo serializeArray = разбить на строки и назначить перем для отправки через FORMdata

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