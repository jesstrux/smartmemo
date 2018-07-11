<?php
    include("../includes/connection.php");

    $rest_json = file_get_contents("php://input");
    
    $_POST = json_decode($rest_json, true);
    $memo_id = $_POST['memo_id'];
    $user_id = $_POST['user_id'];
    $action = (int)$_POST['action'];
    $content = addslashes($_POST['content']);

    // echo "is ufs: " . $_POST['for_ufs'];
    
    if(!isset($content)){ //for 
        // echo "in content";
        if(isset($_POST['for_ufs']) && $_POST['for_ufs']){
            // echo "as ufs";
            $sql = "UPDATE memo_ufs SET status = $action WHERE memo_id = $memo_id AND user_id = $user_id";
        }
        else{
            // echo "not as ufs";
            $action = $action + 1;
            $sql = "UPDATE memo SET status = $action WHERE id = $memo_id";
        }
    }else{
        // echo "not really in content";
        $sql = "INSERT INTO memo_response(memo_id, user_id, action, comment) VALUES($memo_id, $user_id, $action,'$content')";
    }

    // echo $sql;
    // return;

    if ($con->query($sql) === TRUE) {
        echo "success";
    }else{
        echo $sql;
        echo "null";
    }