<?php
    include("includes/send_notification.php");
    include ("includes/connection.php");

    $token = 'e2LPsDW--ig:APA91bE5OEvjc8BQdnb4bmbufuexzFeWoapIez7l1diwDsX2yhj0X3Faz6GK5SMwrlRU7Iy8faHkw7_ALJRZQxlIJr5YgxoDmZpGPtJmnepMgzX44rAex6wyAvSuZ8erUQ2KZEDvwTd6rUKh1sGqSOUbdBGHa44E1w';

    $title = "Walter sent you a memo: Where you at!";
    $message = "Yo, you wasn't at the game, what's up with your behind son?";

    notify_user($token, $title, $message, "MEMO_RECEIVED");

    // notify_user($token, $title, $message);

    // $topic = "DepartmentofComputing";
    // $title = "Yo Departmentants!";
    // $message = "This is a departmentwide memo...";
    // notify_topic($topic, $title, $message);

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