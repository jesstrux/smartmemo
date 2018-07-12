<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 7/11/2018
 * Time: 2:52 PM
 */

class openedMemo
{
  function memoIsRead($con,$user_id,$memo_id){
      //check if already opened

      $sql="SELECT id FROM opened_memo WHERE user_id=$user_id and memo_id=$memo_id";
      $result =	mysqli_query($con, $sql); //execute the query
      $count = mysqli_num_rows($result);
      if($count !=0){
          $addData="INSERT INTO opened_memo (user_id,memo_id) VALUES ('$user_id','$memo_id')";

          if ($con->query($addData) === TRUE) {
              //header("location:staff.php");
          }
      }

  }
}