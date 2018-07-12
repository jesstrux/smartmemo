<?php
    include("../includes/connection.php");

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $type = $_POST['table'];
    $table = strtolower($type);
    $name = $_POST['name'];
    
    // $type = $_GET['table'];
    // $table = strtolower($type);
    // $name = $_GET['name'];

    $sql = "INSERT INTO $table(name) VALUES('$name')";

    if ($con->query($sql) === TRUE) {
        $new_id = $con->insert_id;

        $result = $con->query("SELECT *, '$type' AS type FROM $table WHERE id = $new_id");

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo json_encode($row);
    }else{
        echo null;
    }