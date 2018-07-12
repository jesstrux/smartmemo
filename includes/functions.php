<?php
	function set_page($page){
		$_SESSION['page'] = $page;
	}

	function is_active_page($pages){
		echo (isset($_SESSION['page']) && in_array($_SESSION['page'], $pages)) ? 'active' : '';
	}

	function array_sort_by_column(&$arr, $col, $dir = SORT_ASC){
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }
?>