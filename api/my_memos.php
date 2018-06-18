<?php
    include("../includes/connection.php");

    // $rest_json = file_get_contents("php://input");
    // $_POST = json_decode($rest_json, true);

    $get_id = $_GET['user_id'];

    $sql = "SELECT m.id, m.title, m.body, u.id as recepientId, IF(m.to_userid = $get_id, 'You', CONCAT(u.fname, ' ', u.mname, ' ', u.surname)) AS recepientName, IF(m.to_userid = $get_id, 'Inbox', 'Sent') AS type";
    $sql .= " FROM memo m";
    $sql .= " JOIN users u ON m.to_userid = u.id";
    $sql .= " WHERE from_userid = $get_id OR to_userid = $get_id";
    $sql .= " ORDER BY type";

    $result = mysqli_query($con, $sql);
    $memos = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $memos[] = $row;
        }
        echo json_encode($memos);
    } else {
        echo json_encode(["user_id" => $get_id]);
        echo "null";
    }