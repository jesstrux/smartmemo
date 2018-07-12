<?php include("partials/header.php");

if (isset($_GET['id'])){
    $user_id_edit=$_GET['id'];
    $query = "SELECT * FROM users where id=$user_id_edit";
    $result =	mysqli_query($con, $query); //execute the query
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

}else{
    header("location: staff.php");
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            USER DETAILS
                        </div>
                        <div class="panel-body">
                            <form class="plvr" action="staff.php" method="post">
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