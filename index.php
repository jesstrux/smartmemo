<?php 
    include("partials/header.php");
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
                <?php //if($_SESSION['activation'] !=1 ){
                    if(false){
                    if($_SESSION['activation'] ==0 ){?>
                        <section>
                            <div class="alert alert-primary">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Activation Alert! </strong><br>
                                <p>Please wait your account Activation is pending.</p>
                                <p>Some Features are disabled untill your activation is processed.</p>
                            </div>
                        </section>

                    <?php } elseif ($_SESSION['activation'] ==2){?>
                        <section>
                            <div class="alert alert-primary">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Activation Alert! </strong><br>
                                <p>Please wait your account Activation is pending.</p>
                                <p>Some Features are disabled untill your activation is processed.</p>
                            </div>
                        </section>
                    <?php } ?>
                    <section>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Welcome <?php echo $_SESSION['fullname']; ?>
                            </div>
                            <div class="panel-body">
                                <label>Fullname: <?php echo $_SESSION['fullname']; ?></label><br>
                                <label>Email   : <?php echo $_SESSION['email']; ?></label><br>
                                <label>Phone number: <?php echo $_SESSION['phonenumber']; ?></label><br>
                                <label>Department: <?php echo getDepartment::getdept($con,$_SESSION['dept_id']); ?></label><br>
                                <label>Job Title: <?php echo getJob::getjobs($con,$_SESSION['job_id']); ?></label><br>
                            </div>
                        </div>
                    </section>
                <?php } ?>


            
                <section>
                    <h3 class="section-title text-light">
                        Storyboards
                    </h3>
                    
                    <div class="row" id="departmentsRow">
                        <div class="col-md-4">
                            <div class="memo-department">
                                <div class="memo-count">
                                    <em class="text-light">No</em>
                                    <span>Memos Found</span>
                                </div>
                                <span>Office Announcements</span>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="memo-department">
                                <div class="memo-count">
                                    <em class="text-light">No</em>
                                    <span>Memos Found</span>
                                </div>
                                <span>
                                    <?php echo getDepartment::getdept($con, $_SESSION['dept_id']); ?>
                                </span>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="memo-department">
                                <div class="memo-count">
                                    <em class="text-light">No</em>
                                    <span>Memos Found</span>
                                </div>
                                <span>Replies to Your Memos</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="section-title text-light">
                        Recent Memos
                    </h3>

                    <div>
                        <?php
                            $user_id = $_SESSION['user_id'];
                            $result = getMemo::receivedMemos($con, $user_id, 3);
                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                    <a href="memo-read.php?memo_id=<?php echo $data['id']; ?>" class="memo-item">
                                        <span class="date">
                                            <?php echo date("d  M \'y", mktime($data['created_at'])); ?>
                                        </span>

                                        <h4><?php echo $data['title'] ?> &nbsp;<i class="zmdi zmdi-chevron-right"></i> &nbsp; <?php echo getUsers::getFullname($con, $data['to_userid']) ?></h4>
                                        <p class="trim-text"><?php echo $data['body'] ?> </p>

                                        <?php $attachments_result = getAttachment::fromMemo($con, $data['id']);
                                            if (mysqli_num_rows($attachments_result) > 0) {
                                                echo '<div class="attachments">';
                                                while ($attachment = mysqli_fetch_array($attachments_result)) {
                                                    $ext = end(explode(".", $attachment['document']));
                                                    $type = $ext;
                                                    if (in_array($ext, ["jpg", "png", "gif", "jpeg"]))
                                                        $type = "image";

                                                    echo '
                                                                <div class="attachment ' . $type . '" title="' . $attachment['document'] . '">
                                                                    <i class="zmdi"></i>
                                                                    <span class="trim-text">' . $attachment['document'] . '</span>
                                                                </div>
                                                            ';
                                                }
                                                echo '</div>';
                                            };
                                        ?>
                                    </a>
                            <?php 
                        } ?>
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