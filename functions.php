<?
	
	function if_page($page, $echo, $else = NULL){

		$serv_page = $_SERVER['PHP_SELF'];

		if($serv_page == "$page"){
			echo "$echo";
		} else {
			echo "$else";
		}
	}

// date

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		 'y' => 'y',
		 'm' => 'mo',
		 'w' => 'w',
		 'd' => 'd',
		 'h' => 'h',
		 'i' => 'm',
		 's' => 's',
	);
	foreach ($string as $k => &$v) {
		 if ($diff->$k) {
			  $v = $diff->$k . $v . ($diff->$k > 1 ? '' : '');
		 } else {
			  unset($string[$k]);
		 }
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . '' : '1s';
}

function load_all_posts($cat){
		// prevent errors
		$hidden_arr = array();
		$messaged_arr = array();

		
		$posts = R::find('post', 'cat = ?', [$cat], 'ORDER BY id DESC');
		foreach($posts as $post){
			$all_arr[] = $post["id"];
		}
		// ! hidden
		$hidden = R::find('hidden', 'user_id = ?', [$_SESSION["user"]["id"]]);
		foreach($hidden as $hidden){
			$hidden_arr[] = $hidden["card_id"];
		}		
		// ! messaged
		$messaged = R::find('messaged', 'user_id = ?', [$_SESSION["user"]["id"]]);
		foreach($messaged as $messaged){
			$messaged_arr[] = $messaged["card_id"];
		}	
		$result = array_diff($all_arr, $hidden_arr, $messaged_arr);
		// filtered posts
		$posts = R::loadAll('post', $result);
		return $posts;
}

function load_my_posts($cat){
	$posts = R::find('post', 'user_id = ? AND cat = ?', [$_SESSION["user"]["id"], $cat], 'ORDER BY id DESC');
	return $posts;
}
?>