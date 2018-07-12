<?php
include("partials/header.php");
include('includes/getUsers.php');


if(isset($_POST['activation'])){
    $userid=$_POST['userid'];
    $usersactivation=$_POST['useractivation'];
    if(isset($_POST['status'])){
        $userstatus=$_POST['status'];
    }
    else{
        $userstatus=0;
    }



    $userrole=$_POST['roles'];


    $sql = "UPDATE users SET  user_role_id='$userrole',status='$userstatus',activation='$usersactivation' WHERE id='$userid' ";

    if ($con->query($sql) === TRUE) {
        //header("location:staff.php");
    }else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_GET['user_id'])){
    $user_id_to_activate=$_GET['user_id'];

    $query = "SELECT * FROM users where id=$user_id_to_activate ";
    $result =	mysqli_query($con, $query); //execute the query
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
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
                <form class="plvr" method="post" autocomplete="off">
                    <fieldset>
                        <div class="form-group">
                            <label for="title">Staff fullname</label>
                            <input name="fullname" class="form-control" value="<?php echo getUsers::getFullname($con,$_GET['user_id']); ?>" type="text" disabled>
                            <input name="userid" value="<?php echo $_GET['user_id']; ?>" type="hidden">
                        </div>

                        <div class="form-group">
                            <label for="activation">Account status</label>
                            <select name="useractivation"  class="form-control" id="activation" required>
                                <option value="">Select status</option>
                                <?php
                                $query2 = "SELECT * FROM activation_status";
                                $result2 =	mysqli_query($con, $query2); //execute the query
                                while($data2	=	mysqli_fetch_assoc($result2)){
                                        ?>
                                        <option <?php echo ($row['activation'] == $data2['status'] ? 'selected' : 'no') ?> value="<?php echo $data2['status']?>">
                                            <?php echo $data2['name'];?>
                                        </option>
                                    <?php }?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="roles">Please assing role</label>
                            <select name="roles"  class="form-control" id="roles" required>
                                <option value="0">Select user roles</option>
                                <?php
                                $query = "SELECT * FROM user_role";
                                $result =	mysqli_query($con, $query); //execute the query
                                while($data	=	mysqli_fetch_assoc($result)){
                                        ?>
                                        <option <?php echo ($row['user_role_id'] == $data['id'] ? 'selected' : 'no') ?> value="<?php echo $data['id']?>">
                                            <?php echo $data['name'];?>
                                        </option>
                                    <?php }?>

                            </select>
                        </div>

                        <?php
                        if($row['activation'] == 2 || $row['activation'] == 1) { ?>
                            <div class="form-group">
                                <label for="status">Account status</label>
                                <select name="status"  class="form-control" id="status" required>
                                    <option value="">Select Account status</option>
                                    <option value="0" <?php echo ($row['status'] == 0 ? 'selected' : '') ?> >Active</option>
                                    <option value="1" <?php echo ($row['status'] == 1 ? 'selected' : '') ?>>Blocked</option>
                                </select>
                            </div>
                            <?php } ?>



                        <button type="submit" class="btn btn-primary btn-lg" name="activation">Update Account</button>
                    </fieldset>
                </form>

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