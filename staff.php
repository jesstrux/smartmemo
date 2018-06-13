<?php
include("partials/header.php");
include('includes/getDepartment.php');
include('includes/getJob.php');
include('includes/getRole.php');
?>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">All Staff List</div>
                                <div class="panel-body">
                                    <table class="table table-responsive table-striped table-bordered user-list">
                                        <thead>
                                        <tr>
                                            <th><span>User</span></th>
                                            <th><span>Department</span></th>
                                            <th><span>Email</span></th>
                                            <th><span>Created</span></th>
                                            <th class="text-center"><span>Activation</span></th>
                                            <th class="text-center"><span>Status</span></th>

                                            <th><span>Role</span></th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "SELECT * FROM users";
                                        $result =	mysqli_query($con, $query); //execute the query
                                        while($data	=	mysqli_fetch_assoc($result)){
                                            if($_SESSION['user_id'] !=$data['id']){ ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="user-link">
                                                            <?php echo ucwords($data['fname'].' '.$data['lname'].' '.$data['surname'])?>
                                                        </a>
                                                        <span class="user-subhead">
                                                    <?php echo getJob::getjobs($con,$data['job_id']); ?>
                                                </span>
                                                    </td>

                                                    <td>
                                                        <?php echo getDepartment::getdept($con,$data['dept_id'])?>
                                                    </td>

                                                    <td>
                                                        <a href="#"><?php echo $data['email']; ?></a>
                                                    </td>

                                                    <td><?php echo $data['created_at']?></td>
                                                    <td class="text-center">
                                                        <?php if($data['activation'] == 0){?>
                                                            <span class="label label-default">Pending</span>
                                                        <?php }?>

                                                        <?php if($data['activation'] == 1){?>
                                                            <span class="label label-success">Approved</span>
                                                        <?php }?>

                                                        <?php if($data['activation'] == 2){?>
                                                            <span class="label label-danger">Declined</span>
                                                        <?php }?>
                                                    </td>

                                                    <td class="text-center">

                                                        <?php if($data['status'] == 0 && $data['activation'] == 0){?>
                                                            <span class="label label-default">InActive</span>
                                                        <?php }?>

                                                        <?php
                                                        if($data['activation'] == 2 || $data['activation'] == 1) {
                                                            if($data['status'] == 0){ ?>
                                                                <span class="label label-success">Active</span>
                                                            <?php }   if($data['status'] == 1){ ?>
                                                                <span class="label label-danger">Blocked</span>
                                                            <?php }
                                                        }?>


                                                    </td>


                                                    <td>
                                                        <a href="#">
                                                            <?php
                                                            $rolename=getRole::getUserRole($con,$data['user_role_id']);

                                                            if($rolename !=''){
                                                                echo $rolename;
                                                            }else{ ?>
                                                                <span class="label label-warning">Assing Role</span>
                                                           <?php } ?>
                                                        </a>
                                                    </td>
                                                    <td >
                                                        <a href="#" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                                        </a>
                                                        <a href="#" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                                        </a>
                                                        <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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