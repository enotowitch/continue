<? 
session_start();
require_once "DB.php";
require_once "functions.php";

if($_POST["card_from"] == "/index.php" || $_POST["card_from"] == "/portfolios.php"){
	$posts = load_all_posts($_POST["cat"]);
}
if($_POST["card_from"] == "/post-job.php" || $_POST["card_from"] == "/post-portfolio.php"){
	$posts = load_my_posts($_POST["cat"]);
}



$load_all = array();
foreach($posts as $post){
	$load_all[] = $post["id"];
}


$load_10 = array();
for ($i=$_POST["quantity"]; $i<=$_POST["quantity"]+9; $i++) { 
	$load_10[] = $load_all[$i];
}

$posts = R::loadAll('post', $load_10);

$i = 0;

foreach($posts as $post){
	if($post['id'] != NULL){
	$posted = $post->time;
	$posted = date('Y-m-d H:i:s', $posted);

	$json[$i]["id"] = $post['id'];
	$json[$i]["title"] = $post['title'];
	$json[$i]["subt"] = $post['subt'];
	$json[$i]["salary"] = $post['salary'];
	$json[$i]["duration"] = $post['duration'];
	$json[$i]["experience"] = $post['experience'];
	$json[$i]["workload"] = $post['workload'];
	$json[$i]["location"] = $post['location'];
	$json[$i]["tag_1"] = $post['tag_1'];
	$json[$i]["tag_2"] = $post['tag_2'];
	$json[$i]["tag_3"] = $post['tag_3'];
	$json[$i]["logo"] = $post['logo'];
	for($ex=1;$ex<=10;$ex++){ 
		$json[$i]["example_$ex"] = $post["example_$ex"];
	}
	$json[$i]["user_id"] = $post['user_id'];
	$json[$i]["time"] = time_elapsed_string($posted);
	$json[$i]["cat"] = $post['cat'];

	$json[$i]["current_user"] = $_SESSION["user"]["id"];

	$json[$i]["size"] = $_COOKIE["size"];
	$i++;
	}	
}
echo json_encode($json);
?>
