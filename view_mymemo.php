<?php
    $no_bootstrap = true;
    include("partials/header.php");
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
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-email-open"></i>
                <h1 class="text-light">Inbox Memos</h1>
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
                        $result=getMemo::receivedMemos($con,$user_id);
                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                            <a href="memo-read.php?memo_id=<?php echo $data['id'];?>" class="memo-item">
                                <span class="date">
                                    <?php echo date("d  M \'y", mktime($data['created_at'])); ?>
                                </span>

                                <h4>
                                    <?php
                                        echo getUsers::getFullname($con,$data['from_userid']); 
                                        echo '&nbsp;&nbsp; <i class="zmdi zmdi-chevron-right"></i> &nbsp; ' . $data['title']
                                    ?>
                                </h4>
                                <p class="trim-text"><?php echo $data['body']?> </p>

                                <?php $attachments_result = getAttachment::fromMemo($con, $data['id']);
                                    if(mysqli_num_rows($attachments_result) > 0){
                                        echo '<div class="attachments">';
                                            while ($attachment = mysqli_fetch_array($attachments_result)) {
                                                $ext = end(explode(".",$attachment['document']));
                                                $type = $ext;
                                                if(in_array($ext, ["jpg", "png", "gif", "jpeg"]))
                                                    $type = "image";

                                                echo '
                                                    <div class="attachment ' . $type . '" title="' . $attachment['document'] . '">
                                                        <i class="zmdi"></i>
                                                        <span class="trim-text">' . $attachment['document'] .'</span>
                                                    </div>
                                                ';
                                            }
                                        echo '</div>';
                                    };
                                ?>
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