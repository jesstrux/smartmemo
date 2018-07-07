<?php
    include("../includes/connection.php");
    include("../includes/getAttachment.php");
    include("../includes/getUfs.php");

    $get_id = $_GET['user_id'];

    $sql = "SELECT m.id, m.title, m.body, m.created_at, m.updated_at, u.id as recepientId, s.id as senderId, ";
    $sql .= "IF(m.to_userid = $get_id, 'You', CONCAT(u.fname, ' ', u.mname, ' ', u.surname)) AS recepientName, ";
    $sql .= "IF(m.from_userid = $get_id, 'You', CONCAT(s.fname, ' ', s.mname, ' ', s.surname)) AS senderName, ";
    $sql .= "IF(m.to_userid = $get_id, 'Inbox', 'Sent') AS type";
    $sql .= " FROM memo m";
    $sql .= " JOIN users u ON m.to_userid = u.id";
    $sql .= " JOIN users s ON m.from_userid = s.id";
    $sql .= " WHERE from_userid = $get_id OR to_userid = $get_id";
    $sql .= " ORDER BY m.updated_at DESC";

    $result = mysqli_query($con, $sql);
    $memos = [];

    echo mysqli_error($con);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $row["date"] = date("F jS Y", mktime($row['created_at']));
            $row["attachments"] = getAttachment::forMemo($con, $row["id"]);
            $row["ufs"] = getUfs::forMemo($con, $row["id"]);
            $memos[] = $row;
        }

        echo json_encode($memos);
    } else {
        echo json_encode(["user_id" => $get_id]);
        echo "null";
    }