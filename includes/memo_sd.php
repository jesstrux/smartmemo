<?php
include ("connection.php");
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
        header("location: ../view_mymemo.php?ref=$memo_id&success");
    } else {
        header("location: ../create_memo.php?error");
    }

}
else{
    header("location: ../index.php");
}
?>
