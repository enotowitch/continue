<?
	require_once "DB.php";

$card_id = $_POST['card_id'];
$card_from = $_POST['card_from'];

if($card_from == '/index.php'){
	$destination = "post";
} else {
	$destination = "portfolio";
}

	$del_files = R::find($destination, 'id = ?', [$card_id]);

	foreach($del_files as $file){
		unlink($file["logo"]);
		for($i=1;$i<=10;$i++){
			unlink($file["example_$i"]);
		}
	}


	$delete = R::hunt($destination, 'id = ?', [$card_id]);



?>