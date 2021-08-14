// ! POST & UPDATE

$(document).on('change', '.fake-logo', function (e) {

	var preview = URL.createObjectURL(e.target.files[0]);
	$(this).next('.card__logo_preview').detach();
	$('label[for="fake-logo"]').append('<img class="card__logo card__logo_preview" src="' + preview + '" alt="preview">');
	$('label[for="fake-logo"]').css({ 'border': 'none' });

	console.log(e.target.files[0]);

});


$(document).on('click', '.ok-gray', function (e) {

	e.preventDefault();

	
	var update_card_from = $('.post').find('.card_from').val();
	var card_from = $(e.target).closest('.card').find('.card_from').val();

	var title_val = $(e.target).closest('.card').find('textarea[name="title"]').val().replace(/\s+/g, '').trim();
	var subt_val = $(e.target).closest('.card').find('textarea[name="subt"]').val().replace(/\s+/g, '').trim();

	var title = $(e.target).closest('.card').find('textarea[name="title"]');
	var subt = $(e.target).closest('.card').find('textarea[name="subt"]');


	// ! validation
	$('.please-log').detach();

	// Title
	if (title_val.length <= 3) {
		my_alert("danger", "Title should have more than 3 chars!");
		title.addClass('red-b');
		throw new Error("error from title");
	} else {
		title.removeClass('red-b');
	}
	// Subtitle
	if (subt_val.length <= 3) {
		my_alert("danger", "Subtitle should have more than 3 chars!");
		subt.addClass('red-b');
		throw new Error("error from subt");
	} else {
		subt.removeClass('red-b');
	}

	// ! if card_from == post-job.php -> validate selects it can be from update, and update already must have this!
	if(card_from == '/post-job.php' || card_from == '/post-portfolio.php'){
	
		// selects
	// next() = .chosen-container -> select is hidden by chosen-JQ
	$(e.target).closest('.card').find('select').each(function () {
		if ($(this).val() == null) {

			var name = this.name;

			$(this).next().addClass('red-b-chosen');
			my_alert("danger", `Please select ${name}!`);

			throw new Error("error from each select");

		} else {
			$(this).next().removeClass('red-b-chosen');
		}
	});

	} 
	
	
	// ! if card_from == post-job.php -> validate files it can be from update, and update already must have this!
	if(card_from == '/post-job.php' || card_from == '/post-portfolio.php'){

	// files
	var files_count = $(e.target).closest('.card').find('.fake-example')[0].files;
	if (files_count.length < 1) {
		my_alert("danger", "Please upload atleast 1 example!");
		$(e.target).closest('.card').find('.info__example').addClass('red-b-chosen');
		throw new Error("error from example");
	} else {
		$(e.target).closest('.card').find('.info__example').removeClass('red-b-chosen');
	}

}

// ! tags
if(card_from == '/post-job.php' || card_from == '/post-portfolio.php' || card_from == '/update-form.php'){


	var tags_count = $(e.target).closest('.card').find('.tags__select :selected');

	if (tags_count.length < 3) {
		my_alert("danger", "Please choose 3 tags!");
		$(e.target).closest('.card').find('.chosen-choices').addClass('red-b-chosen');
		throw new Error("error from tags");
	} else {
		$(e.target).closest('.card').find('.chosen-choices').removeClass('red-b-chosen');
	}

}

// ? validation ends

	var fd = new FormData();

	// ! logo
	if(card_from == '/post-job.php' || card_from == '/post-portfolio.php'){
		var logo = $('.fake-logo').prop('files')[0];
	}
	if(card_from == '/update-form.php'){
		var logo = $('.fake-logo-upd').prop('files')[0];
	}
	
	fd.append("logo", logo);

	// ! files
	if(card_from == '/post-job.php' || card_from == '/post-portfolio.php'){
		var file_data = $('input[type="file"]')[1].files; // for multiple files
	}
	if(card_from == '/update-form.php'){
		var file_data = $('.update-card').find('input[type="file"]')[1].files; // for multiple files
	}
	// ! examples
	for (var i = 0; i < file_data.length; i++) {
		fd.append("example_" + (i + 1), file_data[i]);
	}


	var other_data = $(e.target).closest('form').serializeArray();

	// ! form_card -> title + subt TEXT FORMAT
	for (var i = 2; i <= 3; i++) {
		other_data[i].value = other_data[i].value.toLowerCase().replace(/\s+/g, ' ').trim();
		other_data[i].value = other_data[i].value[0].toUpperCase() + other_data[i].value.slice(1);
	}



	$.each(other_data, function (key, input) {
		fd.append(input.name, input.value);
	});

	fd.append("update_card_from", update_card_from);


	if(card_from == '/post-job.php' || card_from == '/post-portfolio.php'){
		var link = 'insert.php';
	}
	if(card_from == '/update-form.php'){
		var link = 'update.php';
	}


	$.post({
		url: `${link}`,
		data: fd,
		processData: false,
		contentType: false,
		success: function () {

			$(e.target).closest('.card').append('<div class="post-anim"></div>');

			$('.post-anim').animate({ 'width': '100%' }, 300);

			setTimeout(() => {

				if (card_from == '/post-job.php') {
					window.location.href = 'index.php';
				}
				if (card_from == '/post-portfolio.php') {
					window.location.href = 'portfolios.php';
				}
				if (card_from == '/update-form.php') {
					window.location.reload();	
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

// ! sql LIKE
// https://unetway.com/tutorial/sql-operator-like

// ! flags
// https://flagpedia.net/download/icons

// // ! unrender json
// $('[name*="pass"]').each(function(){
// 	if($(this).val() != ''){
// 		$(this).removeClass('red-b');
// 	}
// });
// // ? unrender json

// OLD TAGS

// // ! design
// $tags["design"] = ['2D', '3D', 'Product Animation', 'Album', 'Cover Design', 'Animated GIFs', 'Mobile Design', 'Web Design', 'Whiteboard Animation', 'AR Filters', 'Architecture', 'Interior', 'Design', 'Branding', 'Car Wraps', 'Character Modeling', 'Banner Ads', 'Brochure', 'Cartoon', 'Comic', 'Fashion', 'Book', 'Building Modeling', 'Catalog', 'Flyer', 'Brand Style', 'Stationery', 'Character Animation', 'Character', 'Game Design', 'Graphics', 'Illustration', 'Invitation', 'Product Design', 'Industrial Design', 'Landscape', 'Infographic', 'Logo Animation', 'Logo Design', 'Menu', 'Package', 'Portrait', 'Caricature', 'Storyboards', 'Pattern Design', 'Postcard', 'Resume', 'T-Shirt', 'Merchandise', 'Photoshop', 'Poster', 'Signage', 'Tattoo', 'Presentation Design', 'Social Media Design', 'Vector', 'Raster', 'Tracing', 'Modeling', 'Design Lessons', 'Animation', 'Background', 'Art', 'Game Art', 'Render', 'Illustrator', 'Apparel', 'InDesign', 'CAD', 'Canva', 'Concept', 'Identity', 'Childrens', 'Drawing', 'Flat', 'Layout', 'Graphic Design', 'GUI', 'Label', 'Figma', 'Sketch', 'Mockup', 'Pixel Art', 'Zbrush', 'Sculpt', 'SketchUp', 'SolidWorks', 'Textile', 'UI', 'UX', 'UI / UX', 'Blender', 'V-Ray', 'Autodesk', 'Revit', 'Cinema 4D', 'CorelDRAW', 'Watercolor'];
// // ! dev
// $tags["dev"] = ['Chatbot', 'Desktop', 'Cybersecurity', 'Data Protection', 'Data Analysis', 'E-Commerce Dev', 'Databases', 'File Conversion', 'Game Dev', 'QA Testing', 'CMS', 'Website Builders', 'IT Support', 'WordPress', 'Coding Lessons', 'User Testing', 'Web Programming', 'JavaScript', 'Java', 'C Sharp', 'Python', 'PHP', 'TypeScript', 'C', 'Swift', 'Ruby', 'Kotlin', 'Go', 'Scala', '1c', 'T-SQL', 'Dart', 'PL-SQL', 'Pascal / Delphi', 'R', 'Apex', 'Elixir', 'Back-end', 'Front-end', 'Mobile Dev', 'Data processing', 'System', 'Full Stack', 'DevOps', 'Algorithm', 'AR Dev', 'VR Dev', 'API Dev', 'Arduino', 'Blockchain', 'Bot', 'Babylon js', 'Codelgniter', 'Extension Dev', 'CRM', 'Cryptocurrency', 'Drupal', 'ElectronJS', 'Elementor', 'Flutter', 'API', 'HTML', 'Joomla', 'Laravel', 'Machine Learning', 'Css', 'Scss', 'MySQL', 'Magento', 'Dot Net', 'OpenCart', 'PrestaShop', 'React Native', 'Raspberry Pi', 'Rust', 'Ruby on Rails', 'React js', 'SquareSpace', 'Shopify', 'Unity', 'Webflow', 'WiX', 'Woocommerce', 'Zapier'];
// // ! videoAudio
// $tags["videoAudio"] = ['Promo Video', 'Explainer Video', 'Intro / Outro', 'Podcast', 'Article to Video', 'Audio Ad', 'Audiobook', 'Book Trailer', 'DJ', 'eLearning Video', 'Game Trailer', 'Jingle', 'Mixing / Mastering', 'Video', 'Audio', 'Session Musician', 'music', 'Live-Action Explainer', 'Composition', 'Music Production', 'Podcast Editing', 'Short Video Ad', 'Music Transcription', 'Singer / Vocalist', 'Music Video', 'Lyric', 'Music Lessons', 'Screencasting Video', 'Slideshow Video', 'Songwriting', 'Sound Design', 'Sound Effects', 'Spokesperson Video', 'Subtitles / Captions', 'Unboxing', 'Video Editing', 'Visual Effects', 'Vocal Tuning', 'Voice-Over', 'Audio Editing', 'Narrator', 'Actor', 'Motion graphics', 'After Effects', 'Camtasia', 'Apple Motion', 'DaVinci Resolve', 'Adobe Premiere', 'Sony Vegas'];
// // ! marketing
// $tags["marketing"] = ['Marketing Lessons', 'Book / eBook Marketing', 'Community Management', 'Content Marketing', 'Crowdfunding', 'Domain Research', 'Lead Generation', 'E-Commerce Marketing', 'Local SEO', 'Email Marketing', 'Market Research', 'Influencer Marketing', 'Marketing Strategy', 'Mobile Marketing', 'Advertising', 'Public Relations', 'Social Media Management', 'Traffic Optimization', 'Music Promotion', 'SEM', 'Survey', 'SEO', 'Video Marketing', 'Podcast Marketing', 'Social Media Advertising', 'Web Analytics', 'Game Marketing', 'PPC', 'ClickFunnels', 'Conversion Rate', 'AdWords', 'Link Builder', 'Mailchimp', 'PR', 'Backlinking'];
// // ! writing
// $tags["writing"] = ['Writing Lessons', 'Articles', 'Blog Posts', 'Brand Voice', 'Beta Reading', 'Business Names', 'Slogans', 'Book / eBook Writing', 'Case Studies', 'Book Editing', 'Cover Letters', 'Creative Writing', 'Email Copy', 'Grant Writing', 'Legal Writing', 'LinkedIn Profiles', 'Localization', 'Translation', 'Podcast Writing', 'Summaries', 'Press Releases', 'Resume Writing', 'Product Descriptions', 'Sales Copy', 'Proofreading / Editing', 'Scriptwriting', 'Social Media Copy', 'UX Writing', 'Speechwriting', 'Website Content', 'Technical Writing', 'White Paper', 'Game Writing', 'Ghostwriter', 'Screenwriting'];
// // ! other
// $tags["other"] = ['Stream', 'Arts / Crafts', 'Real Estate', 'Online Lessons', 'Offline Lessons', 'Cooking Lessons', 'Business Consulting', 'Craft Lessons', 'Business Plans', 'Data Entry', 'Career Counseling', 'E-Commerce Management', 'HR Consulting', 'Consulting', 'Personal', 'Financial Consulting', 'Legal Consulting', 'Lifestyle', 'Transcripts', 'Flyer Distribution', 'Personal Styling', 'Traveling', 'Gaming', 'Admin / Customer Support', 'Personal Training', 'Virtual Assistant', 'Assistant', 'Wellness', 'Appointment', 'Amazon', 'Asana', 'Administrative', 'Optimization', 'Listing', 'JIRA', 'Engineer', 'Restoration', 'ArcGIS', 'AWS', 'Linux', 'Windows', 'macOS', 'Android', 'iOS', 'Customization', 'App', 'Web', 'Accountant', 'Adobe', 'Law', 'Store', 'Affiliate', 'Autodesk', 'Academic', 'Research', 'Brand', 'Manager', 'Business', 'BigCommerce', 'Analysis', 'Biography', 'Blog', 'Book', 'eBook', 'Call Center', 'Computer Vision', 'Cisco', 'Curriculum', 'Content Creation', 'Campaign', 'Creative', 'Career', 'Copywriter', 'Data', 'Dropshipping', 'Digital', 'Drawer', 'Scientist', 'Miner', 'Drafting', 'Cloud', 'Executive', 'Excel', 'Etsy', 'eBay', 'Ethereum', 'Bitcoin', 'E-Commerce', 'eLearning', 'Email', 'Delivery', 'Estimator', 'Electrical', 'Editor', 'Essay', 'Economics', 'Grammar', 'Facebook', 'Finance', 'Fundraising', 'Ad', 'Google', 'Yandex', 'Sheets', 'Slides', 'Studio', 'Platform', 'Information', 'Maps', 'Script', 'Game', 'Tag', 'Shopping', 'Software', 'Hacker', 'HR', 'Home', 'iPhone', 'Image', 'Editing', 'Recognition', 'Bank', 'Investment', 'Canvas', 'Instructional', 'IP', 'Instagram', 'Tax', 'Internet', 'Whitepaper', 'Jewelry', 'Kindle', 'Direction', 'Publishing', 'Learning', 'Management', 'Legal', 'Advisor', 'LinkedIn', 'Medical', 'Manga', 'Anime', 'Server', 'Strategy', 'Market', 'Media', 'Mechanical', 'Network', 'Trade', 'Outsource', 'Project', 'Product', 'PowerPoint', 'Photo', 'Local', 'Pitch Deck', 'Fix', 'Patent', 'Proposal', 'Photogrammetry', 'Reddit', 'Smartsheet', 'Spreadsheets', 'Sewing', 'Statistics', 'Salesforce', 'Hardware', 'SVG', 'Template', 'Social Media', 'Sales', 'Rep', 'Sourcing', 'Content', 'Trello', 'Technical', 'Support', 'Trademark', 'Converter', 'Producer', 'Capital', 'Plugin', 'Wireframes', 'Theme', 'Youtube', 'Zoom', 'Conference', 'Zendesk', 'Zoho'];
