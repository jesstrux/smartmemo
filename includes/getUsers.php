<?php

class getUsers
{
 public static function userlist(){
     //get the user moduled
     $query = "SELECT * FROM user";
     $result =	mysqli_query($con, $query); //execute the query

     if($result){
         return $result;
     }
     else{
       return "";
     }
 }

    public static function getFullname($con,$user_id){
        //get the user moduled
        $query = "SELECT * FROM users WHERE id=$user_id";

        $result =	mysqli_query($con, $query); //execute the query
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $fname			=	$row['fname'];
        $lname		    =	$row['mname'];
        $surname		=	$row['surname'];

        if($result){
            return ucwords($fname.' '.$lname.' '.$surname);
        }
        else{
            return "";
        }
    }

}