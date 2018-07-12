<?php
include("includes/connection.php");
include("includes/checkPermission.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($con,$_POST['email']);
    $mypassword = md5(mysqli_real_escape_string($con,$_POST['password']));
    $sql = "SELECT * FROM users WHERE email = '$myusername' and password = '$mypassword' and status=0 LIMIT 1";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $active         =   $row['activation'];
    $fname			=	$row['fname'];
    $mname		    =	$row['mname'];
    $surname		=	$row['surname'];
    $dept_id	    =	$row['dept_id'];
    $job_id	        =	$row['job_id'];
    $email	    	=	$row['email'];
    $confirm    	=	$row['confirm'];
    $mobile 	    =	$row['phoneNumber'];
    $role_id 	    =	$row['user_role_id'];
    $user_id 	    =	$row['id'];

    $count = mysqli_num_rows($result);

    // If result matched $username and $password, table row must be 1 row
    if($count == 1) {
        $_SESSION['user_id']=$user_id;
        $_SESSION['fullname']=ucwords($fname.' '.$mname.' '.$surname);
        $_SESSION['fname']=$fname;
        $_SESSION['mname']=$mname;
        $_SESSION['surname']=$surname;
        $_SESSION['email']=$email;
        $_SESSION['dept_id']=$dept_id;
        $_SESSION['job_id']=$job_id;
        $_SESSION['phonenumber']=$mobile;
        $_SESSION['user_role_id']=$role_id;
        $_SESSION['activation']=$active;

        $perms2=checkPermission::verifyPermission($con,$_SESSION['user_role_id'],'System Management');
        if($perms2 ==1){
            header("location: index2.php");
        }
        else{
            header("location: index.php");
        }


    }
    else {
        header("location: login.php?error=" . $con->error);
    }
}
?>