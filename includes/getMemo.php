<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 6/10/2018
 * Time: 3:09 PM
 */

class getMemo
{
 public static function myMemo($con,$user_id){
     $query = "SELECT * FROM memo where from_userid=$user_id ORDER BY updated_at DESC";
     $result =	mysqli_query($con, $query); //execute the query


     return $result;
 }

    public static function inboxMemos($con,$user_id, $limit = null){
        $inbox_memos = self::allReceivedMemos($con, $get_id);
        $ufs_memos = getUfs::forUser($con, $get_id);

        $merged_memos = array_merge($inbox_memos, $ufs_memos);
        $memos = [];

        foreach ($merged_memos as $memo) {
            $recepient = getUsers::byId($con, $memo['to_userid']);
            $memo["recepientName"] = $recepient["fullname"];
            $memo["recepientId"] = $recepient["id"];

            $sender = getUsers::byId($con, $memo['from_userid']);
            $memo["senderId"] = $sender["id"];
            $memo["senderName"] = $sender["fullname"];

            $memos[] = $memo;
        }

        array_sort_by_column($memos, 'updated_at', SORT_DESC);
    }
    
    public static function receivedMemos($con,$user_id, $limit = null){
        $query = "SELECT *, 'false' AS ufs_complete FROM memo where to_userid=$user_id";
        $query .= " ORDER BY updated_at DESC";
        if(isset($limit))
            $query .= " LIMIT $limit";

        $result =	mysqli_query($con, $query); //execute the query


        return $result;
    }

    public static function allReceivedMemos($con, $user_id)
    {
        $sql = "SELECT *, 'false' as is_ufs, 'Inbox' as type,";
        $sql .= " IF((SELECT count(id) FROM memo_ufs ufs WHERE memo_id = m.id AND status > 0) > 0 , 'true', 'false') AS ufs_complete";
        $sql .= " FROM memo m";
        $sql .= " WHERE to_userid = $user_id";
        $sql .= " HAVING 1 > (SELECT count(id) FROM memo_ufs ufs WHERE memo_id = m.id AND status < 1)";
        $sql .= " ORDER BY m.updated_at DESC";

        $result = mysqli_query($con, $sql); //execute the query

        mysqli_error($con);

        $memos = [];

        while($row = mysqli_fetch_array($result)){
            $row["date"] = date("F jS Y", mktime($row['created_at']));
            $row["attachments"] = getAttachment::forMemo($con, $row["id"]);
            $row["ufs"] = [];

            $memos[] = $row;
            // recepientId, s . id as senderId
        }

        return $memos;
    }

    public static function allSentMemos($con, $user_id)
    {
        $sql = "SELECT *, 'false' as is_ufs, 'Sent' as type";
        $sql .= " FROM memo m";
        $sql .= " WHERE from_userid = $user_id";
        $sql .= " ORDER BY m.updated_at DESC";

        $result = mysqli_query($con, $sql); //execute the query

        $memos = [];

        while ($row = mysqli_fetch_array($result)) {
            $row["date"] = date("F jS Y", mktime($row['created_at']));
            $row["attachments"] = getAttachment::forMemo($con, $row["id"]);
            $row["ufs"] = getUfs::forMemo($con, $row["id"]);

            $memos[] = $row;
        }

        return $memos;
    }

    public static function byId($con, $id, $user_id){
        $query = "SELECT m.*, ";
        $query .= "IF(m.from_userid = $user_id, true, false) AS sent, ";
        $query .= "IF(m.from_userid = $user_id, r.id, s.id) AS other_user_id ";
        $query .= "FROM memo m ";
        $query .= "JOIN users s on s.id = m.from_userid ";
        $query .= "JOIN users r on r.id = m.to_userid ";
        $query .= "WHERE m.id=$id";

        $result =	mysqli_query($con, $query); //execute the query


        return $result;
    }
}