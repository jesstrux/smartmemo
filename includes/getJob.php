<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 6/10/2018
 * Time: 2:18 PM
 */

class getJob
{
    public static function getjobs($con,$job_id=null){
        //get the user moduled
        $query = "SELECT * FROM job WHERE id=$job_id";
        $result =	mysqli_query($con, $query); //execute the query

        if($result){
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            return $row['name'];
        }
        else{
            return "";
        }
    }
}