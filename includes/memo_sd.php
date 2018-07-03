<?php
include ("connection.php");
include("send_notification.php");
include("notify.php");

function getUfsValues($memo_id, $values){
    return implode(", ", array_map(function ($user_id, $level) use ($memo_id) {

        return "(" . $memo_id . "," . $user_id . "," . ((int)$level + 1) . ")";

    }, $values, array_keys($values)));
}

function getAttachmentValues($memo_id, $values){
    return implode(", ", array_map(function ($attachment) use ($memo_id) {

        return "(" . $memo_id . ",'" . $attachment . "')";

    }, $values));
}

// echo json_encode($_POST);
// return;

if(isset($_POST['save']) || isset($_POST['draft'])){

    $title=$_POST['title'];
    $body= addslashes($_POST['body']);
    $refid=$_POST['ref_id'];
    $from=$_POST['fromid'];
    $to=$_POST['to'];
    $ufs=$_POST['ufs'];
    $attachments=$_POST['attachments'];

    if(isset($_POST['save'])){
        $status=1;
    }
    if(isset($_POST['draft'])){
        $status=0;
    }
    $sql = "INSERT INTO memo (title,body,ref_id,from_userid,to_userid,status) VALUES ('$title','$body','$refid','$from','$to','$status')";

    if ($con->query($sql) === TRUE) {
        $memo_id = $con->insert_id;

        if(isset($attachments)){
            $attachment_values = getAttachmentValues($memo_id, explode(",", $attachments));
            $save_attachments = $con->query("INSERT INTO memo_attachment (memo_id,document) VALUES " . $attachment_values);
        }

        if(isset($ufs)){
            $ufs_values = getUfsValues($memo_id, explode(",", $ufs));
            $save_ufs = $con->query("INSERT INTO memo_ufs (memo_id,user_id,level) VALUES " . $ufs_values);
        }

        $memo_id=mysqli_insert_id($con);

        $query_token = "SELECT device_token FROM users WHERE id = $to LIMIT 1";
        $result_token = mysqli_query($con, $query_token);

        Notify::set_success("Memo successfully sent!");

        if (mysqli_num_rows($result_token) > 0) {
            $row = mysqli_fetch_array($result_token, MYSQLI_ASSOC);
            $token = $row["device_token"];


            $name_sql = "SELECT fname FROM users WHERE id = $from";
            $result_name = mysqli_query($con, $name_sql);

            $name_row = mysqli_fetch_array($result_name, MYSQLI_ASSOC);

            if (mysqli_num_rows($result_name) > 0) {
                $message = $name_row['fname'] . "sent you a memo: " . $title;
                notify_user($token, $title, $message);
            }   
        }
        header("location: ../view_mymemo.php?ref=$memo_id");
        // header("location: ../memo-read.php?memo_id=$memo_id");
    } else {
        Notify::set_error("Failed to save memo!");
        // print_r($con->error);
        header("location: ../create_memo.php");
    }
}
else{
    header("location: ../index.php");
}
?>
