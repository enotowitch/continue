<?
	require_once "DB.php";



	$del_files = R::find('post', 'id = ?', [$_POST['card_id']]);

	foreach($del_files as $del_file){
		// if logo src starts from i (img) -> don't delete - it's default file (no-logo)
	if($del_file["logo"][0] != "i"){
		unlink($del_file["logo"]);
	} 

	for($i=1;$i<=10;$i++){
		unlink($del_file["example_$i"]);
	}
	
	}





	$delete = R::hunt('post', 'id = ?', [$_POST['card_id']]);

	// ! delete card_id from DB - LIKE, HIDE, MESD

	R::hunt('liked', 'card_id = ?', [$_POST['card_id']]);
	R::hunt('hidden', 'card_id = ?', [$_POST['card_id']]);
	R::hunt('messaged', 'card_id = ?', [$_POST['card_id']]);



?>