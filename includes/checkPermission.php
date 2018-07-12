<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 7/9/2018
 * Time: 11:23 AM
 */

class checkPermission
{

    function verifyPermission($con,$role_id,$permission){
        $getPermission="SELECT * FROM permissions WHERE name='$permission' ";
        $result2 = mysqli_query($con, $getPermission);
        $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $permission_id=$row['id'];

        $query = "SELECT * FROM role_permission WHERE role_id=$role_id and permission_id=$permission_id";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        if($count != 0){
          return 1;
        }
        return 0;

    }
}