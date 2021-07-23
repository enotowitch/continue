<? 
session_start();
require_once "DB.php";
require_once "functions.php";

// logo = 14, examples = 90


// ? test_post ($user_id, $title, $subt, $salary, $duration, $experience, $workload, $location, $tag_1, $tag_2, $tag_3, $time, $cat, $logo_num, $example_series)
// $example_series -> 0 = example1-10.jpg ... 30 = example30-40.jpg ...

// ! JOBS
// 1
test_post($_SESSION['user']['id'], "Illustrator/animator", "MyArtComp", "$31/h", "Shift", "3 years", "180 h/mo", "US","animation", "brand", "creative", time(), 'job', 1, 0);
// 2
test_post($_SESSION['user']['id'], "Web & Graphic designer", "Freelancer", "$25/h", "Freelance", "5 years", "150 h/mo", "GB","layout", "photo", "img edit", time() - (60 * 60 * 24), 'job', 2, 0);
// 3
test_post($_SESSION['user']['id'], "Designer", "AdsGuru", "$45/h", "Full-Time", "7 years", "120 h/mo", "AG","brand", "CAD", "img edit", time() - (60 * 60 * 24 * 4), 'job', 6, 30);
// 4
test_post($_SESSION['user']['id'], "Comic Artist", "99arts", "$15/h", "Perm", "4 years", "160 h/mo", "NZ", "comic", "creative", "editorial", time() - (60 * 60 * 24 * 2), 'job', 7, 40);
// 5
test_post($_SESSION['user']['id'], "Colorist", "@YES.TM", "$28/h", "Temp", "6 years", "170 h/mo", "PT", "storyboard", "creative", "presentation", time() - (60 * 60 * 24 * 1), 'job', 8, 50);
// 6
test_post($_SESSION['user']['id'], "Creative video maker", "goodstyleinc", "$45/h", "Project", "8 years", "145 h/mo", "SA", "VR / AR", "video", "UX / UI", time() - (60 * 60 * 24 * 3), 'job', 9, 60);
// ! FOLIOS
// 1
test_post($_SESSION['user']['id'], "2d Artist, graphic designer", "Freelancer", "$24/h", "Freelance", "7 years", "176 h/mo", "UA","art", "illustration", "UX / UI", time() - (60 * 60 * 24 * 2), 'folio', 3, 0);
// 2
test_post($_SESSION['user']['id'], "2d Artist", "Freelancer", "$35/h", "Full-Time", "3 years", "200 h/mo", "RU","motion", "animation", "video", time() - (60 * 60 * 24 * 3), 'folio', 4, 10);
// 3
test_post($_SESSION['user']['id'], "Artist", "Freelancer", "$12/h", "Part-Time", "2 years", "120 h/mo", "AX","art", "anime", "CAD", time() - (60 * 60 * 24 * 4), 'folio', 5, 20);
// 4
test_post($_SESSION['user']['id'], "Versatile artist", "Self-Employed", "$29/h", "Full-Time", "5 years", "180 h/mo", "UA","art", "design", "character", time() - (60 * 60 * 24 * 1), 'folio', 9, 60);
// 5
test_post($_SESSION['user']['id'], "Digital artist", "Design guru", "$49/h", "Perm", "12 years", "100 h/mo", "US", "graphic", "fashion", "direction", time() - (60 * 60 * 24 * 15), 'folio', 10, 30);
// ? 6
test_post($_SESSION['user']['id'], "Cartoonist", "artist", "$19/h", "Temp", "8 years", "140 h/mo", "UA", "cartoonist", "cartoonist", "cartoonist", time() - (60 * 60 * 24 * 15), 'folio', 10, 30);






header('Location: /');
die();
?>