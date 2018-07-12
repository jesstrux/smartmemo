<?php
$no_bootstrap = true;
include("partials/header.php");
include("includes/getRole.php");
?>
<body class="show-na">
<main class="layout">
    <?php
    include("partials/aside.php");
    $squery_status=0;
    if(isset($_POST['save'])){
        $perms=$_POST['perms'];
        $r_id=$_POST['roles'];

        $sql_update = "DELETE FROM role_permission WHERE role_id=$r_id";
        $con->query($sql_update);

        foreach ($perms as $p_id){
            $sql = "INSERT INTO role_permission (role_id,permission_id) VALUES ('$r_id','$p_id')";
            if ($con->query($sql) === TRUE) {
                //success
                $squery_status=1;
            } else {
                //failed
                $squery_status=2;
            }
        }


    }
    ?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-accounts-list-alt"></i>
                <h1 class="text-light"><?php echo getRole::getUserRole($con,$_GET['r'])?> Role</h1>
            </section>

            <div class="section-wrapper">
                <section>
                    <?php if($squery_status==1){?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Success!</strong> Permissions are Successfully Saved.
                        </div>
                    <?php }?>
                    <?php if($squery_status==2){?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Error!</strong> Permissions are not Successfully Saved.
                        </div>
                    <?php }?>
                    <div class="layout start justified">
                        <div class="add-box flex">
                            <h2 class="text-light">Add Permission</h2>

                            <form method="post" autocomplete="off" class="">
                                <div class="form-group" style="margin-bottom: 10px !important;">
                                    <input name="roles" value="<?php echo $_GET['r']; ?>" type="hidden" required>

                                    <select class="js-example-basic-multiple" name="perms[]" multiple="multiple" style="width: 100%;" required>
                                        <option value="">Select recepient</option>
                                        <?php

                                        $user_query = "SELECT * FROM permissions";
                                        $result = mysqli_query($con, $user_query); //execute the query
                                        while ($p = mysqli_fetch_assoc($result)) {
                                            echo '<option value = "'.$p['id'].'">';
                                            echo $p['name'] . '</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="rounded-btn btn-sm imperfect btn-success" name="save">SUBMIT</button>
                            </form>
                        </div>
                        <div class="flex table-box">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th class="text-center" style="width: 60px; padding: 1.5em 0.6em">S/N</th>
                                <th style="width:59%; padding-left: 2em">Permission</th>
                                <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                <?php
                                $roled=$_GET['r'];
                                $query = "SELECT * FROM role_permission WHERE role_id=$roled";
                                $i = 1;
                                $result = mysqli_query($con, $query); //execute the query
                                while ($data = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td ><?php echo  getRole::getPermission($con,$data['permission_id'])?></td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="rp_id" value="<?php echo $data['id']; ?>" >
                                                <button name="roleId" class="rounded-btn btn-sm btn-danger" value="<?php echo $roled; ?>">PERMISSIONS</button>
                                            </form>

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
<?php include ("partials/js.php"); ?>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>
