<?php

class getUsers
{
 public static function userlist($con){
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

    public static function byId($con, $user_id, $for_api = false)
    {
        if (!$for_api){
            $query = "SELECT *, CONCAT(fname, ' ', mname, ' ', surname) AS fullname FROM users WHERE id=$user_id";
            $result = mysqli_query($con, $query); //execute the query

            if (!$result)
                echo mysqli_error($con);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            return $row;
        }
        else {
            $query = "SELECT u.id, u.activation, u.status, CONCAT(u.fname, ' ', u.mname, ' ', u.surname) AS name, u.email, u.phoneNumber AS phone, IF(u.activation != 0, 'true', 'false') AS activated, d.name AS department, j.name AS job, r.name AS role";
            $query .= " FROM users u";
            $query .= " JOIN department d ON u.dept_id = d.id";
            $query .= " JOIN job j ON u.job_id = j.id";
            $query .= " LEFT JOIN user_role r ON u.user_role_id = r.id";
            $query .= " WHERE u.id=$user_id";

            $result = mysqli_query($con, $query); //execute the query

            if (!$result)
                echo [];

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            return $row;
        }
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