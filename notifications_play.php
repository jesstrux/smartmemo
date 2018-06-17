<?php
    include("includes/send_notification.php");

    $token = 'dIe3ttm4244:APA91bFqmPNRXvGVilB_Cyd0Rrar34TJc_CJr_vVR1sSL_s2u31LgK8WQgIQ7l25Jv266MIRFhqjY957yZTjXyvHy3_CCIfkFbqhYCxC8bC0xLaQackFpSyRQTsRxBpNU5PGERKRfklz';

    // $title = "Hey user!";
    // $message = "One Two, Mike Testing...";
    // notify_user($token, $title, $message);

    // $topic = "Departmentofcomputing";
    // $title = "Yo Departmentants!";
    // $message = "This is a departmentwide memo...";
    // notify_topic($topic, $title, $message);

    $topic = "Admin";
    $title = "To All Admins!";
    $message = "A new user has registered, please confirm them...";
    notify_topic($topic, $title, $message);