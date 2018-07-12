<?php include("partials/header.php");
include('includes/getDepartment.php');
include('includes/getJob.php');
include("includes/getMemo.php");
include("includes/getUsers.php");
include("includes/getAttachment.php");

?>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <?php include ('partials/dashboard.php'); ?>

                <br>
                <br>
                <section>
                    <h3 class="section-title text-light">
                        Pending Activations
                    </h3>

                    <div>
                        <?php
                        $query = "SELECT * FROM users where activation=0";
                        $result =	mysqli_query($con, $query); //execute the query
                        while($data	=	mysqli_fetch_assoc($result)){
                            if($_SESSION['user_id'] !=$data['id']){ ?>
                                <div class="memo-item">
                                    <span class="date"><?php echo $data['created_at']?></span>
                                    <h4>
                                        <?php echo getDepartment::getdept($con,$data['dept_id'])?> &nbsp;
                                        <i class="zmdi zmdi-chevron-right"></i> &nbsp; <?php echo getJob::getjobs($con,$data['job_id']); ?>
                                    </h4>
                                    <p class="trim-text">
                                        <?php echo ucwords($data['fname'].' '.$data['mname'].' '.$data['surname'])?>
                                    </p>

                                    <div class="attachments">
                                        <div class="attachment" title="<?php echo $data['phoneNumber']; ?>">
                                            <i class="zmdi"></i>
                                            <span class="trim-text"><?php echo $data['phoneNumber']; ?></span>
                                        </div>

                                        <div class="attachment" title="<?php echo $data['email']; ?>" style="background: #0081ff;color:#fff">
                                            <i class="zmdi"></i>
                                            <span class="trim-text"><?php echo $data['email']; ?></span>
                                        </div>

                                        <a class="attachment btn-sm btn-rounded" style="background: #000;color:#fff" href="activation.php?user_id=<?php echo $data['id']; ?>">
                                            Activate
                                        </a>
                                        <!-- <button class="attachment" style="background: #ff8b90;color:#fff" >Action</button> -->

                                    </div>

                                </div>
                            <?php } }?>
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