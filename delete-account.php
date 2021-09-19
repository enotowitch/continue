<? 
session_start();
require_once "DB.php";

// ! delete files
$del_files = R::find('post', 'user_id = ?', [$_SESSION['user']['id']]);
	foreach($del_files as $del_file){
		// delete img only if it's from UPLOADS
	if($del_file["logo"][0] == "u"){
		unlink($del_file["logo"]);
	} 

	for($i=1;$i<=10;$i++){
		if($del_file["example_$i"][0] == "u"){
			unlink($del_file["example_$i"]);
		}
	}	
	}
// ? delete files
$message = R::hunt('message', 'user_to_id = ?', [$_SESSION['user']['id']]);
$message = R::hunt('message', 'user_from_id = ?', [$_SESSION['user']['id']]);
// 
$applied = R::hunt('applied', 'user_id = ?', [$_SESSION['user']['id']]);
$liked = R::hunt('liked', 'user_id = ?', [$_SESSION['user']['id']]);
$hidden = R::hunt('hidden', 'user_id = ?', [$_SESSION['user']['id']]);
$user = R::hunt('user', 'id = ?', [$_SESSION['user']['id']]);
$post = R::hunt('post', 'user_id = ?', [$_SESSION['user']['id']]);



unset($_SESSION['user']);
?>

