<?php
$no_bootstrap = true;
include("partials/header.php");
include("includes/getMemo.php");
include("includes/getAttachment.php");
?>
<?php include("includes/getUsers.php"); ?>
<link rel="stylesheet" href="css/staff_home.css">

<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php"); ?>

    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php"); ?>

        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-border-color"></i>
                <h1 class="text-light">Memo Drafts</h1>
            </section>

            <div class="section-wrapper">
                <section>
                    <div>
                        <?php
                        $user_id= $_SESSION['user_id'];
                        $result=memoInfo::myMemo($con,$user_id,3);
                        if(!is_null($result)){
                            while($data	= mysqli_fetch_assoc($result)){ ?>
                                <a href="memo-read.php?memo_id=<?php echo $data['id']; ?>" class="memo-item">
                                    <span class="date">
                                        <?php echo date("d  M \'y", strtotime($data['created_at'])); ?>
                                    </span>

                                    <h4><?php echo $data['title']?> &nbsp;<i class="zmdi zmdi-chevron-right"></i> &nbsp; <?php echo getUsers::getFullname($con,$data['to_userid'])?></h4>
                                    <p class="trim-text"><?php echo memoInfo::limit_text($data['body'])?> </p>

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
                            <?php }
                        }
                        ?>
                    </div>
                </section>
            </div>

            <footer class="layout center-justified">
                Coyright &copy; Smart Memo 2018
            </footer>
        </div>
    </div>
</main>

<?php include("partials/js.php"); ?>
</body>
</html>