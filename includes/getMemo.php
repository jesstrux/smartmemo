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

 public static function receivedMemos($con,$user_id, $limit = null){
     $query = "SELECT * FROM memo where to_userid=$user_id";
     $query .= " ORDER BY updated_at DESC";
     if(isset($limit))
        $query .= " LIMIT $limit";

     $result =	mysqli_query($con, $query); //execute the query


     return $result;
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