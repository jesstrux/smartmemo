<?php
    include("includes/connection.php");

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    // $post_token = $_POST['token'];
    // $post_email = $_POST['email'];
    // $post_password = $_POST['password'];

    $post_token = "b3a02d7552f5c7d0adaa52fafbbc58f4";
    $post_email = "wakyj07@gmail.com";
    $post_password = "@ttss;86%";
    
    $myusername = mysqli_real_escape_string($con, $post_email);
    $mypassword = md5(mysqli_real_escape_string($con, $post_password));
    // $mypassword = "2774282e834ffc9b651c4ef31272ffe1";

    $sql = "SELECT u.id, CONCAT(u.fname, ' ', u.mname, ' ', u.surname) AS name, u.email, u.phoneNumber AS phone, d.name AS department, j.name AS job, r.name AS role";
    $sql .= " FROM users u";
    $sql .= " JOIN department d ON u.dept_id = d.id";
    $sql .= " JOIN job j ON u.job_id = j.id";
    $sql .= " LEFT JOIN user_role r ON u.user_role_id = r.id";
    $sql .= " WHERE email = '$myusername' and password = '$mypassword' and status=0";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 1) {
        // $id = $row['id'];
        // mysqli_query($con, "UPDATE users SET device_token = '$post_token' WHERE id = $id");
        
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        header('Content-Type: application/json');
        // echo json_encode(["email" => $myusername, "password" => $post_password]);
        echo "null";
        // @ttss;86%
    }