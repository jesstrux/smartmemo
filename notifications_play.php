<?php
    include("includes/send_notification.php");
    include ("includes/connection.php");

    // $token = 'cIlmLu9YdLg:APA91bH3hSCHZ41UZMF7N9a8s7cvLBo65iy47AVNNXhWnN6KR-JdneNI-nPJEsNbc8XNmoyXIXoCtozx7-a21F0pamxSvgBTpA1_b_CPuFV1JHLaYfSP44kKp8nv1aZH4OBulh1yynVz69nK9BKBUyydcAsilqIwgw';

    // $title = "System Maintainance!";
    // $message = "Hey Walter, we'll be doing some minor system maintaince later this evening. Please make sure you've got your affairs in order by then.";
    // notify_user($token, $title, $message);

    // $topic = "Departmentofcomputing";
    // $title = "Yo Departmentants!";
    // $message = "This is a departmentwide memo...";
    // notify_topic($topic, $title, $message);

    $topic = "Admin";
    $title = "To All Admins!";
    $message = "A new user has registered, please confirm them...";
    notify_topic($topic, $title, $message, "OH_MY");
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