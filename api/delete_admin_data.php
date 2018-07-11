<?php
    include("../includes/connection.php");

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $type = $_POST['table'];
    $table = strtolower($type);
    $id = $_POST['id'];
    
    // $type = $_GET['table'];
    // $table = strtolower($type);
    // $name = $_GET['name'];

    // $sql = "DELETE FROM $table WHERE id = $id";
    $sql = "UPDATE $table SET status = 0 WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "success";
    }else{
        echo null;
    }