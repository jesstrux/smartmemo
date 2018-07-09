<?php
    include("../includes/connection.php");

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);
    $memo_id = $_POST['memo_id'];
    $user_id = $_POST['user_id'];
    $action = $_POST['action'];
    $content = $_POST['content'];

    if(isset($_POST['for_ufs'])){
        $sql = "UPDATE memo_ufs SET status = (int)$action WHERE memo_id = $memo_id AND user_id = $user_id";
    }else{
        $sql = "INSERT INTO memo_response(memo_id, user_id, action, comment) VALUES($memo_id, $user_id, $action,'$content')";
    }

    if ($con->query($sql) === TRUE) {
        echo "success";
    }else{
        echo "null";
    }