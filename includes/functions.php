<?php
	function set_page($page){
		$_SESSION['page'] = $page;
	}

	function is_active_page($pages){
		echo (isset($_SESSION['page']) && in_array($_SESSION['page'], $pages)) ? 'active' : '';
	}
?>