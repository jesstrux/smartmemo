<?php
include ("connection.php");
include("send_notification.php");

if(isset($_POST['save']) || isset($_POST['draft'])){

    $title=$_POST['title'];
    $body=$_POST['body'];
    $refid=$_POST['ref_id'];
    $from=$_POST['fromid'];
    $to=$_POST['to'];

    if(isset($_POST['save'])){
        $status=1;
    }
    if(isset($_POST['draft'])){
        $status=0;
    }
    $sql = "INSERT INTO memo (title,body,ref_id,from_userid,to_userid,status) VALUES ('$title','$body','$refid','$from','$to','$status')";

    if ($con->query($sql) === TRUE) {
        $memo_id=mysqli_insert_id($con);

        $query_token = "SELECT device_token FROM users WHERE id = $to";
        $result_token = mysqli_query($con, $query_token);

        if (mysqli_num_rows($result_token) > 0) {
            $row = mysqli_fetch_array($result_token, MYSQLI_ASSOC);
            $token = $row["device_token"];


            $name_sql = "SELECT fname FROM users WHERE id = $from";
            $result_name = mysqli_query($con, $name_sql);

            $name_row = mysqli_fetch_array($result_name, MYSQLI_ASSOC);

            if (mysqli_num_rows($result_name) > 0) {
                $message = $name_row['fname'] . "sent you a memo: " . $title;
                notify_user($token, $title, $message);

                header("location: ../view_mymemo.php?ref=$memo_id&success");
            } else {
                header("location: ../view_mymemo.php?ref=$memo_id&success");
            }
        }else{
            header("location: ../view_mymemo.php?ref=$memo_id&success");
        }
    } else {
        header("location: ../create_memo.php?error");
    }

}
else{
    header("location: ../index.php");
}
?>
