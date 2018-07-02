<?php include("partials/header.php");
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
                                <span>Registrar's Office</span>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="memo-department">
                                <div class="memo-count">
                                    <em class="text-light">5</em>
                                    <span>Memos Found</span>
                                </div>
                                <span>Accounting / Finance Department</span>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="memo-department">
                                <div class="memo-count">
                                    <em class="text-light">1</em>
                                    <span>Memo Found</span>
                                </div>
                                <span>Dean of Subjects Office</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="section-title text-light">
                        Recent Memos
                    </h3>

                    <div>
                        <a href="#" class="memo-item">
                            <span class="date">May 15</span>
                            <h4>Request drive folder access &nbsp;
                                <i class="zmdi zmdi-chevron-right"></i> &nbsp; Barikieli Chamikye</h4>
                            <p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>
                        </a>

                        <a href="#" class="memo-item">
                            <span class="date">May 3</span>
                            <h4>Fund Re-Embursment &nbsp; <i class="zmdi zmdi-chevron-right"></i> &nbsp; Accounting Department</h4>
                            <p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>

                            <div class="attachments">
                                <div class="attachment pdf" title="Financial Report for the educated.">
                                    <i class="zmdi"></i>
                                    <span class="trim-text">Financial Report for the educated.</span>
                                </div>

                                <div class="attachment xls" title="Financial Report for the educated.">
                                    <i class="zmdi"></i>
                                    <span class="trim-text">Item cost breakdown.</span>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="memo-item">
                            <span class="date">April 17</span>
                            <h4>Last Year Notes &nbsp;
                                <i class="zmdi zmdi-chevron-right"></i> &nbsp; Feston Chambili</h4>
                                <p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>
                        </a>

                        <a href="#" class="memo-item">
                            <h4>Socialist Test One First Draft &nbsp;
                                <i class="zmdi zmdi-chevron-right"></i> &nbsp; HOD Social Protection</h4>
                            <span class="date">May 15</span>
                                <p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>

                            <div class="attachments">
                                <div class="attachment docx" title="Math Test 1 first Draft">
                                    <i class="zmdi"></i>
                                    <span class="trim-text">Math Test 1 first Draft.</span>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="memo-item">
                            <h4>Unqualified Student Removal &nbsp;
                                <i class="zmdi zmdi-chevron-right"></i> &nbsp; Dean of School</h4>
                            <span class="date">May 15</span>
                                <p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>
                        </a>
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