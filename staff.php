<?php
$no_bootstrap = true;

include("partials/header.php");
include('includes/getDepartment.php');
include('includes/getJob.php');
include('includes/getRole.php');

$show_alert=0;
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
  $sql="UPDATE users SET fname='$fname',mname='$mname',surname='$surname', email='$email',phoneNumber='$phonenumber',dept_id='$department',
         job_id='$job_title' WHERE id='$edit_user_id'";

  if ($con->query($sql) === TRUE) {
      //set alert true
     $show_alert=1;
}
}
?>

<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-accounts"></i>
                <h1 class="text-light">Staff Members</h1>
            </section>
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <section>
                    <table style="margin-top: -1em;">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Department</th>
                                <th>Postion</th>
                                <th>Email</th>
                                <th class="text-center">Activation</th>
                                <th class="text-center">Status</th>

                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM users";
                                $result = mysqli_query($con, $query); //execute the query
                                while ($data = mysqli_fetch_assoc($result)) {
                                    if ($_SESSION['user_id'] != $data['id']) { ?>
                                        <tr>
                                            <td>
                                                <a href="#" class="user-link">
                                                    <?php echo ucwords($data['fname'] . ' ' . $data['mname'] . ' ' . $data['surname']) ?>
                                                </a>
                                            </td>

                                            <td>
                                                <?php echo getDepartment::getdept($con, $data['dept_id']) ?>
                                            </td>

                                            <td>
                                                <?php echo getJob::getjobs($con, $data['job_id']); ?>
                                            </td>

                                            <td>
                                                <a href="#"><?php echo $data['email']; ?></a>
                                            </td>

                                            <td class="text-center">
                                                <?php if ($data['activation'] == 0) { ?>
                                                    <span class="label label-default"></span> Pending&nbsp;&nbsp;&nbsp;
                                                <?php 
                                            } ?>

                                                <?php if ($data['activation'] == 1) { ?>
                                                    <span class="label label-success"></span> Approved
                                                <?php 
                                            } ?>

                                                <?php if ($data['activation'] == 2) { ?>
                                                    <span class="label label-danger"></span> Declined
                                                <?php 
                                            } ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if ($data['status'] == 0 && $data['activation'] == 0) { ?>
                                                    <span class="label label-default"></span> InActive&nbsp;
                                                <?php } ?>

                                                <?php
                                                    if ($data['activation'] == 2 || $data['activation'] == 1) {
                                                        if ($data['status'] == 0) { ?>
                                                            <span class="label label-success"></span> Active&nbsp;&nbsp;&nbsp;
                                                        <?php 
                                                        }
                                                    if ($data['status'] == 1) { ?>
                                                        <span class="label label-danger"></span> Blocked
                                                    <?php 
                                                    }
                                                } ?>
                                            </td>


                                            <td class="text-center">
                                                <a href="#">
                                                    <?php
                                                    $rolename = getRole::getUserRole($con, $data['user_role_id']);

                                                    if ($rolename != '') {
                                                        echo $rolename;
                                                    } else { ?>
                                                        --
                                                    <?php 
                                                } ?>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="table-action" style="display: none">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="edit_user.php?id=<?php echo $data['id']; ?>" class="table-action warning">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="#" class="table-action danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php 
                                }
                            } ?>
                        </tbody>
                    </table>
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