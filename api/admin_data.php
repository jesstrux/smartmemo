<?php
    include("../includes/connection.php");
    include("../includes/getUsers.php");

    // $rest_json = file_get_contents("php://input");
    // $_POST = json_decode($rest_json, true);
    // $user_id = $_POST['user_id'];

    $sql = "SELECT id, name AS title, 'Department' AS type FROM department ";
    $sql .= "UNION SELECT id, name AS title, 'Job' AS type FROM job ";
    $sql .= "UNION SELECT id, CONCAT(fname, ' ', mname, ' ', surname) AS title, 'Staff' as type FROM users";

    $result = mysqli_query($con, $sql);
    $items = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($row['type'] == "Staff")
                $row['user'] = getUsers::byId($con, $row['id']);
            else
                $row['user'] = null;

            $items[] = $row;
        }

        echo json_encode($items);
    } else {
        echo json_encode(["user_id" => $get_id]);
        echo "null";
    }