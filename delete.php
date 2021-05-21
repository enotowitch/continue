<?
	require_once "DB.php";

$card_id = $_POST['card_id'];
$card_from = $_POST['card_from'];

var_dump($_POST);
// die();

if($card_from == '/post-job.php'){
	$destination = "post";
} 
if($card_from == '/post-portfolio.php'){
	$destination = "portfolio";
}

	$del_files = R::find($destination, 'id = ?', [$card_id]);

	foreach($del_files as $del_file){
		// if logo src starts from i (img) -> don't delete - it's default file (no-logo)
	if($del_file["logo"][0] == "i"){
		continue;
	} else {
		unlink($del_file["logo"]);
	}
		
		for($i=1;$i<=10;$i++){
			unlink($del_file["example_$i"]);
		}
	}


	$delete = R::hunt($destination, 'id = ?', [$card_id]);

	// ! delete card_id from LIKE

	R::hunt('like', 'card_id = ?', [$_POST['card_id']]);



?>