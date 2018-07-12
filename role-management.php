<?php
$no_bootstrap = true;
include("partials/header.php");
?>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");
    $squery_status=0;
    if(isset($_POST['save'])){
        $name=$_POST['dept'];
        $sql = "INSERT INTO user_role (name) VALUES ('$name')";

        if ($con->query($sql) === TRUE) {
            //success
            $squery_status=1;
        } else {
            //failed
            $squery_status=2;
        }
    }
    ?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-accounts-list-alt"></i>
                <h1 class="text-light">User Roles</h1>
            </section>

            <div class="section-wrapper">
                <section>
                    <?php if($squery_status==1){?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Success!</strong> Role is Successfully Saved.
                        </div>
                    <?php }?>
                    <?php if($squery_status==2){?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Error!</strong> Role is not Successfully Saved.
                        </div>
                    <?php }?>
                    <div class="layout start justified">
                        <div class="add-box flex">
                            <h2 class="text-light">Add Role</h2>

                            <form method="post" autocomplete="off">
                                <div class="input-group">
                                    <!-- <label for="dept">Department name</label> -->
                                    <input id="dept" name="dept" placeholder="Enter role name here" type="text" required>
                                </div>
                                <button type="submit" class="rounded-btn btn-sm imperfect btn-success" name="save">SUBMIT</button>
                            </form>
                        </div>
                        <div class="flex table-box">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th class="text-center" style="width: 60px; padding: 1.5em 0.6em">S/N</th>
                                <th style="width:59%; padding-left: 2em">Role</th>
                                <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM user_role";
                                $i = 1;
                                $result = mysqli_query($con, $query); //execute the query
                                while ($data = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td ><?php echo $data['name']; ?></td>
                                        <td>
                                            <a href="permissions.php?r=<?php echo $data['id'];?>" class="rounded-btn btn-sm btn-danger">PERMISSIONS</a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                } ?>

                                </tbody>
                            </table>
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
<?php include ("partials/js.php"); ?></body>
</html>