$(document).ready(function(){

		// ! multiple PREVIEW 

		$(function () {
			// Multiple images preview in browser
			var imagesPreview = function (input, placeToInsertImagePreview) {
	
				if (input.files) {
					var filesAmount = input.files.length;
	
					for (i = 0; i < filesAmount; i++) {
						var reader = new FileReader();
	
						reader.onload = function (event) {
							$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						}
	
						reader.readAsDataURL(input.files[i]);
					}
				}
	
			};


	
			// ! update preview big
	
			$(document).on('change', '.fake-example-upd', function (e) {
	
				var filesAmount = this.files.length;


				
				if(filesAmount > 10){
					$(this).closest('.card').find('.info__example').addClass('red').text('10 files max!');
					return;
				}
				if(filesAmount <= 10){
					$(this).closest('.card').find('.info__example').removeClass('red').addClass('brand-bg').text(`${filesAmount}/10`);
				}
				if(filesAmount == 0){
					$(this).closest('.card').find('.info__example').addClass('red').text('0/10 files!');
					$(this).closest('.card').next('.post-preview').detach();
					return;
				}
	
				// ! update preview small
				if($(this).closest('.w_small').hasClass('w_small')){
					
				$(this).closest('.card').next('.post-preview').detach();
				$(this).closest('.card').after('<div class="post-preview"></div>');
	
	
				imagesPreview(this, $(this).closest('.card').next('.post-preview'));
	
	
				setTimeout(() => {
					my_slick_3($(this).closest('.card').next('.post-preview'));
				}, 100);
	
				}
				// ? update preview small
	
	
				$(e.target).closest('.card').find('.info__pics').slick('unslick');
				$(e.target).closest('.update-card').find('.info__pics').empty();
	
	
				imagesPreview(this, 'div.info__pics_preview');
	
	
				setTimeout(() => {
	
					var info__pics = $(e.target).closest('.card').find('.info__pics');
					my_slick(info__pics);
	
				}, 100);
	
	
			});
	
	
			// ! post preview small
	
			$(document).on('change', '.fake-example', function (e) {
	
				var filesAmount = this.files.length;
				
				if(filesAmount > 10){
					$(this).closest('.card').find('.info__example').addClass('red').text('10 files max!');
					return;
				}
				if(filesAmount <= 10){
					$(this).closest('.card').find('.info__example').removeClass('red').addClass('brand-bg').text(`${filesAmount}/10`);
				}
				if(filesAmount == 0){
					$(this).closest('.card').find('.info__example').addClass('red').text('0/10 files!');
					$(this).closest('.card').next('.post-preview').detach();
					return;
				}
	
	
				$(this).closest('.card').next('.post-preview').detach();
				$(this).closest('.card').after('<div class="post-preview"></div>');
	
	
				imagesPreview(this, $(this).closest('.card').next('.post-preview'));
	
	
				setTimeout(() => {
					my_slick_3($(this).closest('.card').next('.post-preview'));
				}, 100);
				
	
			});
	
	
	
		});
	

})