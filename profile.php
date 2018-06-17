<?php 
    include("partials/header.php");
    include('includes/getDepartment.php');
    include('includes/getJob.php');
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
                    <label>Fullname: <?php echo $_SESSION['fullname']; ?></label><br>
                    <label>Email   : <?php echo $_SESSION['email']; ?></label><br>
                    <label>Phone number: <?php echo $_SESSION['phonenumber']; ?></label><br>
                    <label>Department: <?php echo getDepartment::getdept($con,$_SESSION['dept_id']); ?></label><br>
                    <label>Job Title: <?php echo getJob::getjobs($con,$_SESSION['job_id']); ?></label><br>
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