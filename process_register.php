<?php
include ("includes/connection.php");
include("includes/send_notification.php");
include("includes/getUsers.php");

session_start();

if(isset($_POST['register'])){

    $fname			=	$_POST['fname'];
    $mname		    =	$_POST['mname'];
    $surname		=	$_POST['surname'];
    $dept_id	    =	$_POST['department'];
    $job_id	        =	$_POST['job_title'];
    $email	    	=	$_POST['email'];
    $password	    =	$_POST['password'];
    $confirm    	=	$_POST['confirm'];
    $mobile 	    =	$_POST['mobile'];

    $full_name = ucwords($fname . ' ' . $mname . ' ' . $surname);

    //check if password match
    if($password != $confirm){
        //var_dump($password.' confirm= '.$confirm);
        header("location: register.php?pd=error&error");
    }

    //encrypt password
    $password=md5($password);

    //save data to users table
    $sql = "INSERT INTO users (fname,mname,surname,email,phoneNumber,password,dept_id,job_id)
     VALUES ('$fname','$mname','$surname','$email','$mobile','$password','$dept_id','$job_id')";

    if ($con->query($sql) === TRUE) {
        $user_id=mysqli_insert_id($con);
        $_SESSION['user_id']=$user_id;
        $_SESSION['fullname']=ucwords($fname.' '.$mname.' '.$surname);
        $_SESSION['fname']=$fname;
        $_SESSION['mname']=$mname;
        $_SESSION['surname']=$surname;
        $_SESSION['email']=$email;
        $_SESSION['dept_id']=$dept_id;
        $_SESSION['job_id']=$job_id;
        $_SESSION['phonenumber']=$mobile;
        $_SESSION['activation']=0;

        $topic = "Admin";
        $title = "New User Registered!";
        $message = "$full_name has registered to Smart Memo, please confirm them.";

        $data = json_encode(getUsers::byId($con, $user_id, true));

        notify_topic($topic, $title, $message, "USER_TO_ACTIVATE", $data);

        header("location: index.php");
    } else {
        header("location: register.php?error=". $con->error);
    }
}

?>