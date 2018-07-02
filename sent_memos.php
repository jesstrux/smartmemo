<?php
    $no_bootstrap = true;
    include("partials/header.php");

    include("includes/getMemo.php");
    include("includes/getUsers.php");
?>

<link rel="stylesheet" href="css/staff_home.css">
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-mail-send"></i>
                <h1 class="text-light">Sent Memos</h1>
            </section>
            <div class="section-wrapper">
                <?php if(isset($_GET['success'])){?>
                    <section>
                            <div class="alert alert-success">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Success!</strong> Memo is Successfully Saved.
                            </div>
                    </section>
                <?php } ?>

                <section>
                    <div>
                        <?php
                        $user_id= $_SESSION['user_id'];
                        $result=getMemo::myMemo($con,$user_id);
                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                            <a href="memo-read.php?memo_id=<?php echo $data['id']; ?>" class="memo-item">
                                <span class="date">
                                    <?php echo date("d  M \'y", mktime($data['created_at'])); ?>
                                </span>

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