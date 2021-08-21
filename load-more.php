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
	$json[$i]["example_1"] = $post['example_1'];
	$json[$i]["example_2"] = $post['example_2'];
	$json[$i]["example_3"] = $post['example_3'];
	$json[$i]["example_4"] = $post['example_4'];
	$json[$i]["example_5"] = $post['example_5'];
	$json[$i]["example_6"] = $post['example_6'];
	$json[$i]["example_7"] = $post['example_7'];
	$json[$i]["example_8"] = $post['example_8'];
	$json[$i]["example_9"] = $post['example_9'];
	$json[$i]["example_10"] = $post['example_10'];

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
