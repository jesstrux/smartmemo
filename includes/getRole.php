<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 6/11/2018
 * Time: 1:06 PM
 */

class getRole
{
    public static function getUserRole($con,$role_id=null){

        if($role_id != 0){
            //get the user moduled
            $query = "SELECT * FROM user_role WHERE id=$role_id";
            $result =	mysqli_query($con, $query); //execute the query

            if($result){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                return $row['name'];
            }
            else{
                return "";
            }
        }
        return "";
    }


    public static function getPermission($con,$p_id=null){

        if($p_id != 0){
            //get the user moduled
            $query = "SELECT * FROM permissions WHERE id=$p_id";
            $result =	mysqli_query($con, $query); //execute the query

            if($result){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                return $row['name'];
            }
            else{
                return "";
            }
        }
        return "";
    }
}