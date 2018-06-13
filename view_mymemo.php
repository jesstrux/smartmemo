<?php include("partials/header.php");
include("includes/getMemo.php");
include("includes/getUsers.php");?>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <div class="section-wrapper">
                <!-- Page content goes here-->

                    <?php if(isset($_GET['success'])){?>
                <section>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Success!</strong> Memo is Successfully Saved.
                        </div>
                </section>
                    <?php } ?>

                <section>
                    <h3 class="section-title text-light">
                        My memo list
                    </h3>
                    <div>
                        <?php
                        $user_id= $_SESSION['user_id'];
                        $result=getMemo::myMemo($con,$user_id);
                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                            <a href="#" class="memo-item">
                                <span class="date"><?php echo $data['created_at']; ?></span>
                                <h4><?php echo $data['title']?> &nbsp;<i class="zmdi zmdi-chevron-right"></i> &nbsp; <?php echo getUsers::getFullname($con,$data['to_userid'])?></h4>
                                <p class="trim-text"><?php echo $data['body']?> </p>
                            </a>
                            <?php } ?>
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