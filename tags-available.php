<?
session_start();
require_once "DB.php";
require_once "functions.php";


if($_POST["card_from"] == "/index.php"){
	$tags = load_all_posts('job');
}
if($_POST["card_from"] == "/portfolios.php"){
	$tags = load_all_posts('folio');
}
if($_POST["card_from"] == "/post-job.php"){
	$tags = load_my_posts('job');
}
if($_POST["card_from"] == "/post-portfolio.php"){
	$tags = load_my_posts('folio');
}


$tags_available = array();

foreach($tags as $tag){
	for($i=1;$i<=3;$i++){
		if($tag["tag_$i"] != NULL){
			$tags_available[] = $tag["tag_$i"];
		}
	}
}

echo json_encode(array_unique($tags_available));
?>