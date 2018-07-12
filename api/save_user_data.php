<?php
    include("../includes/connection.php");

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $status = $_POST['status'];
    $activation = $_POST['activation'];
    $role = $_POST['role'];

    $table = strtolower($type);
    $name = $_POST['name'];
    
    // $type = $_GET['table'];
    // $table = strtolower($type);
    // $name = $_GET['name'];

    $sql = "UPDATE users SET status = $status, activation = $activation, user_role_id = $role";

    if ($con->query($sql) === TRUE) {
        $new_id = $con->insert_id;

        $result = $con->query("SELECT *, '$type' AS type FROM $table WHERE id = $new_id");

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo json_encode($row);
    }else{
        echo null;
    }