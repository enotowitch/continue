// ! post form_card (2)
var form_card = $('.form-card');


form_card.on('submit', function (e) {

	e.preventDefault();

	var card_from = $('.card_from').val();

	var logo = $('.fake-logo').prop('files')[0];

	var title = $('.card__title').val();
	var subt = $('.card__subt').val();

	var salary = $(this).find('select[name="salary"]').val();
	var duration = $(this).find('select[name="duration"]').val();
	var experience = $(this).find('select[name="experience"]').val();
	var workload = $(this).find('select[name="workload"]').val();
	var location = $(this).find('select[name="location"]').val();

	var tag_1 = $(this).find('optgroup').children('option:selected').eq(0).val();
	var tag_2 = $(this).find('optgroup').children('option:selected').eq(1).val();
	var tag_3 = $(this).find('optgroup').children('option:selected').eq(2).val();

	var example_1 = $('.fake-example').prop('files')[0];
	var example_2 = $('.fake-example').prop('files')[1];
	var example_3 = $('.fake-example').prop('files')[2];
	var example_4 = $('.fake-example').prop('files')[3];
	var example_5 = $('.fake-example').prop('files')[4];
	var example_6 = $('.fake-example').prop('files')[5];
	var example_7 = $('.fake-example').prop('files')[6];
	var example_8 = $('.fake-example').prop('files')[7];
	var example_9 = $('.fake-example').prop('files')[8];
	var example_10 = $('.fake-example').prop('files')[9];


	var form_data = new FormData();
	form_data.append('card_from', card_from);

	form_data.append('logo', logo);

	form_data.append('title', title);
	form_data.append('subt', subt);

	form_data.append('salary', salary);
	form_data.append('duration', duration);
	form_data.append('experience', experience);
	form_data.append('workload', workload);
	form_data.append('location', location);

	form_data.append('tag_1', tag_1);
	form_data.append('tag_2', tag_2);
	form_data.append('tag_3', tag_3);

	form_data.append('example_1', example_1);
	form_data.append('example_2', example_2);
	form_data.append('example_3', example_3);
	form_data.append('example_4', example_4);
	form_data.append('example_5', example_5);
	form_data.append('example_6', example_6);
	form_data.append('example_7', example_7);
	form_data.append('example_8', example_8);
	form_data.append('example_9', example_9);
	form_data.append('example_10', example_10);

	$.post({
		url: 'insert.php',
		data: form_data,
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
