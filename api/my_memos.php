<?php
    include("../includes/connection.php");

    // $rest_json = file_get_contents("php://input");
    // $_POST = json_decode($rest_json, true);

    $get_id = $_GET['user_id'];

    $sql = "SELECT m.id, m.title, m.body, u.id as recepientId, IF(m.to_userid = $get_id, 'You', CONCAT(u.fname, ' ', u.mname, ' ', u.surname)) AS recepientName, IF(m.to_userid = $get_id, 'Inbox', 'Sent') AS type";
    $sql .= ", att.document AS attachment";
    $sql .= " FROM memo m";
    $sql .= " JOIN users u ON m.to_userid = u.id";
    $sql .= " LEFT JOIN memo_attachment att ON att.memo_id = m.id";
    $sql .= " WHERE from_userid = $get_id OR to_userid = $get_id";
    $sql .= " ORDER BY type";

    $result = mysqli_query($con, $sql);
    $memos = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $memos[] = $row;
        }

        $newMemoInfo = [];
        $newMemoKey = [];
        $newKey = 0;

        foreach ($memos as $memoKey => $memoValue) {
            if (!in_array($memoValue["id"], $newMemoKey)) {
                ++$newKey;
                $newMemoInfo[$newKey]["id"] = $memoValue["id"];
                $newMemoInfo[$newKey]["title"] = $memoValue["title"];
                $newMemoInfo[$newKey]["body"] = $memoValue["body"];
                $newMemoInfo[$newKey]["recepientId"] = $memoValue["recepientId"];
                $newMemoInfo[$newKey]["recepientName"] = $memoValue["recepientName"];
                $newMemoInfo[$newKey]["type"] = $memoValue["type"];
            }

            if($memoValue["attachment"]){
                $attachment = $memoValue["attachment"];
                $ext = end(explode(".", $attachment));
                $type = $ext;
                if (in_array($ext, ["jpg", "png", "gif", "jpeg"]))
                    $type = "image";

                $pattern = '/_?\.'.$ext.'/';
                $name = preg_replace($pattern, "", $attachment);
                $name = str_replace("_", " ", $name);

                $newMemoInfo[$newKey]["attachments"][] = [
                    "name" => $name,
                    "type" => $type,
                    "src" => $attachment
                ];
            }
            else
                $newMemoInfo[$newKey]["attachments"] = [];
                
            $newMemoKey[] = $memoValue["id"];
        }
        echo json_encode(array_values($newMemoInfo));
    } else {
        echo json_encode(["user_id" => $get_id]);
        echo "null";
    }