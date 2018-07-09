<?php
    include("../includes/connection.php");

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    echo json_encode(array('response' => "success"));