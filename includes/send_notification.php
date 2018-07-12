<?php
    define('API_ACCESS_KEY', 'AAAAJQSrNVE:APA91bHUK3v__uh4W9pUcHB4hYhIJsSOfHEMrHKveoSe7wO2PgH_l-X8mdR1S2aAfsn-BMgo45vjUlGNl2WJhwsRZXN8b9yosoDGBO92T5SYgi3LC4ir1iJr-MMzgUQF_wmT8YbbRat3');

    function notify_user($token, $title, $message, $type = "GENERAL_NOTIFICATION"){
        $msg = array(
            'title' => $title,
            'message' => $message,
            'action_type' => $type
        );

        $fields = array(
            'to' => $token,
            'data' => $msg
        );

        send_notification($fields);
    }

    function notify_users($tokens, $title, $message, $type = "GENERAL_NOTIFICATION"){
        $msg = array(
            'title' => $title,
            'message' => $message,
            'action_type' => $type
        );
        $fields = array(
            'registration_ids' => $tokens,
            'notification' => $msg
        );

        send_notification($fields);
    }

    function notify_topic($topic, $title, $message, $type = "GENERAL_NOTIFICATION"){
        $msg = array(
            'title' => $title,
            'message' => $message,
            'action_type' => $type
        );

        $fields = array(
            "condition" => "'$topic' in topics",
            "data" => $msg,
            "ttl" => 3600
        );

        send_notification($fields);
    }

    function send_notification($fields){
        $headers = array(
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        // echo $result;
    }