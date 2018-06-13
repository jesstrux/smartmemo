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
     $query = "SELECT * FROM memo where from_userid=$user_id";
     $result =	mysqli_query($con, $query); //execute the query


     return $result;
 }
}