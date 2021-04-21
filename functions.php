<?
	
	function if_page($page, $echo, $else = NULL){

		$serv_page = $_SERVER['PHP_SELF'];

		if($serv_page == "$page"){
			echo "$echo";
		} else {
			echo "$else";
		}
	}

?>