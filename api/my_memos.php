<?php
    include("../includes/connection.php");

    // $rest_json = file_get_contents("php://input");
    // $_POST = json_decode($rest_json, true);

    $get_id = $_GET['user_id'];

    $sql = "SELECT m.id, m.title, m.body, u.id as recepientId, CONCAT(u.fname, ' ', u.mname, ' ', u.surname) AS recepientName";
    $sql .= " FROM memo m";
    $sql .= " JOIN users u ON m.to_userid = u.id";
    $sql .= " WHERE from_userid = $get_id";

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