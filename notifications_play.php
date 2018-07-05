<?php
    include("includes/send_notification.php");
    include ("includes/connection.php");

    // $token = 'dIe3ttm4244:APA91bFqmPNRXvGVilB_Cyd0Rrar34TJc_CJr_vVR1sSL_s2u31LgK8WQgIQ7l25Jv266MIRFhqjY957yZTjXyvHy3_CCIfkFbqhYCxC8bC0xLaQackFpSyRQTsRxBpNU5PGERKRfklz';

    // $title = "Hey user!";
    // $message = "One Two, Mike Testing...";
    // notify_user($token, $title, $message);

    $topic = "Departmentofcomputing";
    $title = "Yo Departmentants!";
    $message = "This is a departmentwide memo...";
    notify_topic($topic, $title, $message);

    // $topic = "Admin";
    // $title = "To All Admins!";
    // $message = "A new user has registered, please confirm them...";
    // notify_topic($topic, $title, $message, "USER_REGISTERED");

    // $from = 8;
    // $to = 11;

    // $query_token = "SELECT device_token FROM users WHERE id = $to";
    // $result_token = mysqli_query($con, $query_token);

    // if (mysqli_num_rows($result_token) > 0) {
    //     $row = mysqli_fetch_array($result_token, MYSQLI_ASSOC);
    //     $token = $row["device_token"];

        
    //     $name_sql = "SELECT fname FROM users WHERE id = $from";
    //     $result_name = mysqli_query($con, $name_sql);
        
    //     $name_row = mysqli_fetch_array($result_name, MYSQLI_ASSOC);

    //     if (mysqli_num_rows($result_name) > 0) {
    //         echo $name_row['fname'];

    //         $title = "New memo!";
    //         $message = $name_row['fname'] . "sent you a memo: " . $post_title;
    //         notify_user($token, $title, $message);
    //     }else{
    //         "No results found!";
    //     }
    // }