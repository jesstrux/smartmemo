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

    public static function byId($con, $user_id)
    {
        $query = "SELECT *, CONCAT(fname, ' ', mname, ' ', surname) AS fullname FROM users WHERE id=$user_id";

        $result = mysqli_query($con, $query); //execute the query

        if(!$result)
            echo mysqli_error($con);
            
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $row;
    }
    public static function getFullname($con,$user_id){
        $row = self::byId($con, $user_id);

        $fname			=	$row['fname'];
        $lname		    =	$row['mname'];
        $surname		=	$row['surname'];

        if($row){
            return ucwords($fname.' '.$lname.' '.$surname);
        }
        else{
            return "";
        }
    }

}