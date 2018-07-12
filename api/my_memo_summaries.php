<?php
    include("../includes/connection.php");

    // $rest_json = file_get_contents("php://input");
    // $_POST = json_decode($rest_json, true);

    $get_id = $_GET['user_id'];

    $inbox_count = str_pad(4, 2, 0, STR_PAD_LEFT);
    $dept_count = str_pad(5, 2, 0, STR_PAD_LEFT);
    $draft_count = str_pad(3, 2, 0, STR_PAD_LEFT);

    echo json_encode([$inbox_count, $dept_count, $draft_count]);