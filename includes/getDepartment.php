<?php
class getDepartment
{
    public static function getdept($con,$dept_id=null){
        //get the user moduled
        $query = "SELECT * FROM department WHERE id=$dept_id";
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