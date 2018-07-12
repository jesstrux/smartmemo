<?php
    include("includes/connection.php");
    include("includes/send_notification.php");

    $get_id = $_GET['user_id'];

    $sql = "SELECT device_token FROM users WHERE id = $get_id";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    

    if (mysqli_num_rows($result) == 1) {
        $token = $row['device_token'];
        mysqli_query($con, "UPDATE users SET activation = 1 WHERE id = $get_id");
        echo json_encode($row);

        $msg = array(
            'action_type' => 'ACTIVATE_USER'
        );

        $fields = array(
            'to' => $token,
            'data' => $msg
        );

        send_notification($fields);
    } else {
        header('Content-Type: application/json');
        // echo json_encode(["email" => $myusername, "password" => $post_password]);
        echo "null";
        // @ttss;86%
    }