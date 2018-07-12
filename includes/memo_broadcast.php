<?php
include ("connection.php");


function getAttachmentValues($memo_id, $values){
    return implode(", ", array_map(function ($attachment) use ($memo_id) {

        return "(" . $memo_id . ",'" . $attachment . "')";

    }, $values));
}

if(isset($_POST['save'])) {

    $title = $_POST['title'];
    $body = addslashes($_POST['body']);
    $refid = $_POST['ref_id'];
    $user_id = $_POST['fromid'];
    $depts = $_POST['memoto'];

    $sender_dept=$_SESSION['dept_id'];

    $attachments = $_POST['attachments'];


    $sql = "INSERT INTO broadcast (title,body,ref_id,user_id,dept_id) VALUES ('$title','$body','$refid','$user_id','$sender_dept')";

    if ($con->query($sql) === TRUE) {
        $memo_id = $con->insert_id;

        if ($attachments != '') {
            if (isset($attachments)) {
                $attachment_values = getAttachmentValues($memo_id, explode(",", $attachments));
                $save_attachments = $con->query("INSERT INTO broadcast_attachment (memo_id,document) VALUES " . $attachment_values);
            }
        }

        foreach ($depts as $dept_id){
            $sql_depts="INSERT INTO broadcast_receivers (broadcast_id,dept_id) VALUES ($memo_id,$dept_id)";
            $data=$con->query($sql_depts);
        }

        header("location: ../broadcast_memo.php");
    }


}

?>
