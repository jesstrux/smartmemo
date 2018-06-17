<?php
include ('includes/connection.php');
$show_alert=0;
session_start();

if(isset($_POST['update_user'])){

    $edit_user_id=$_POST['edit_user_id'];
    $fname=$_POST['firstname'];
    $mname=$_POST['middlename'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $department=$_POST['department'];
    $job_title=$_POST['job_title'];

//updated user details sql
    $sql="UPDATE users SET fname='$fname',mname='$mname',surname='$surname', email='$email',phoneNumber='$phonenumber',dept_id='$department', job_id='$job_title' WHERE id='$edit_user_id'";

    if ($con->query($sql) === TRUE) {
        //set alert true
        $_SESSION['fullname']=ucwords($fname.' '.$mname.' '.$surname);
        $_SESSION['fname']=$fname;
        $_SESSION['mname']=$mname;
        $_SESSION['surname']=$surname;
        $_SESSION['email']=$email;
        $_SESSION['dept_id']=$department;
        $_SESSION['job_id']=$job_title;
        $_SESSION['testing']='qwerty';
        $_SESSION['phonenumber']=$phonenumber;
        $show_alert=1;
        $con->close();
    }
}
include("partials/header.php");

if (isset($_SESSION['user_id'])){
    $user_id_edit=$_SESSION['user_id'];
    $query = "SELECT * FROM users where id=$user_id_edit";
    $result =	mysqli_query($con, $query); //execute the query
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
}else{
    header("location: index.php");
}




?>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>

        <div id="mainContent">
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <section>

                    <?php

                    if($show_alert ==1){?>
                        <section>
                            <div class="alert alert-success">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Success!</strong> Your details is updated successfully.
                            </div>
                        </section>
                    <?php } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            YOUR DETAILS
                        </div>
                        <div class="panel-body">
                            <form class="plvr" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="edit_user_id" value="<?php echo $row['id']; ?>">
                                    <label for="firstname">Firstname</label>
                                    <input class="form-control" id="firstname" name="firstname" type="text" value="<?php echo $row['fname']?>">
                                </div>
                                <div class="form-group">
                                    <label for="middlename">Middlename</label>
                                    <input class="form-control" id="middlename" name="middlename" value="<?php echo $row['mname']?>" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input class="form-control" id="lastname" name="surname" value="<?php echo $row['surname']?>" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="email" value="<?php echo $row['email']?>">
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Phone number</label>
                                    <input class="form-control" name="phonenumber" id="phonenumber" type="text" value="<?php echo $row['phoneNumber']?>">
                                </div>
                                <div class="form-group">
                                    <label for="department">Choose Department</label>
                                    <select class="form-control" required id="department" name="department">
                                        <option value=""></option>
                                        <?php
                                        $query = "SELECT * FROM department";
                                        $result =	mysqli_query($con, $query); //execute the query
                                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                                            <option <?php if($data['id'] == $row['dept_id']){ echo 'selected'; }?> value="<?php echo $data['id']?>"><?php echo $data['name']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="job_title">Choose Job title</label>
                                    <select class="form-control" required id="job_title" name="job_title">
                                        <option value=""></option>
                                        <?php
                                        $query = "SELECT * FROM job";
                                        $result =	mysqli_query($con, $query); //execute the query
                                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                                            <option
                                                value="<?php echo $data['id']?>"   <?php if($data['id'] == $row['job_id']){ echo 'selected'; }?>
                                            >
                                                <?php echo $data['name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                            </form>
                        </div>
                    </div>

                </section>

            </div>
            <footer class="layout center-justified">
                Coyright &copy; Smart Memo 2018
            </footer>
        </div>
    </div>
</main>
<?php include ("partials/js.php"); ?>
</body>
</html>