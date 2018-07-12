<?php 
    include("includes/connection.php");
    include("partials/header.php");
    include('includes/getDepartment.php');
    include('includes/getJob.php');
    include('includes/getUsers.php');

    if(isset($_GET['user_id'])){
        $user = getUsers::byId($con, $_GET['user_id']);
    }
    else if(isset($_SESSION['user_id'])){
        $user = getUsers::byId($con, $_SESSION['user_id']);
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
                <div class="panel-body">
                    <label>Fullname: <?php echo $user['fullname']; ?></label><br>
                    <label>Email   : <?php echo $user['email']; ?></label><br>
                    <label>Phone number: <?php echo $user['phoneNumber']; ?></label><br>
                    <label>Department: <?php echo getDepartment::getdept($con,$user['dept_id']); ?></label><br>
                    <label>Job Title: <?php echo getJob::getjobs($con,$user['job_id']); ?></label><br>
                </div>
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