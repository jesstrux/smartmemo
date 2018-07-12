<?php
    include("includes/connection.php");
    include("includes/send_notification.php");

    // $get_id = $_GET['user_id'];

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    mysqli_query($con, "UPDATE users SET activation = 1, status = 0, user_role_id = $role WHERE id = $user_id");
    

    if (mysqli_num_rows($result) == 1) {
        $sql = "SELECT device_token FROM users WHERE id = $user_id";

        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $token = $row['device_token'];
        
        if(isset($_GET['id']))
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