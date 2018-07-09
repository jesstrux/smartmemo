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

    $memos = array_merge($inbox_memos, $ufs_memos, $sent_memos);

    foreach ($memos as $memo) {
        $recepient = getUsers::byId($con, $memo['to_userid']);
        $memo["recepientName"] = $recepient["fullname"];
        $memo["recepientId"] = $recepient["id"];
        
        $sender = getUsers::byId($con, $memo['from_userid']);
        $memo["senderId"] = $sender["id"];
        $memo["senderName"] = $sender["fullname"];
    }

    echo json_encode($memos);