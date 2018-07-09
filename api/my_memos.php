<?php
    include("../includes/connection.php");
    include("../includes/getUsers.php");
    include("../includes/getMemo.php");
    include("../includes/getAttachment.php");
    include("../includes/getUfs.php");

    $get_id = $_GET['user_id'];

    $inbox_memos = getMemo::allReceivedMemos($con, $get_id);
    $sent_memos = getMemo::allSentMemos($con, $get_id);
    $ufs_memos = getUfs::forUser($con, $get_id);

    $merged_memos = array_merge($inbox_memos, $ufs_memos, $sent_memos);
    $memos = [];

    foreach ($merged_memos as $memo) {
        $recepient = getUsers::byId($con, $memo['to_userid']);
        $memo["recepientName"] = $recepient["fullname"];
        $memo["recepientId"] = $recepient["id"];
        
        $sender = getUsers::byId($con, $memo['from_userid']);
        $memo["senderId"] = $sender["id"];
        $memo["senderName"] = $sender["fullname"];

        $memos[] = $memo;
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }


    array_sort_by_column($memos, 'updated_at', SORT_DESC);

    echo json_encode($memos);