<?php
$no_bootstrap = true;
include("partials/header.php");

include("includes/getMemo.php");
include("includes/getUsers.php");
include("includes/getAttachment.php");
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
                <h1 class="text-light">Broadcasted Memo</h1>
            </section>
            <div class="section-wrapper">
                <section>
                    <div>
                        <?php
                        $dept_id= $_SESSION['dept_id'];
                        $sql_depts="SELECT broadcast_id FROM broadcast_receivers WHERE dept_id='$dept_id'  ORDER BY broadcast_id DESC";
                        $results2 =	mysqli_query($con,$sql_depts); //execute the query
                        while($data2=mysqli_fetch_array($results2,MYSQLI_ASSOC)){
                            $broadcast_id=$data2['broadcast_id'];

                        $sql="SELECT * FROM broadcast WHERE id='$broadcast_id' ";
                        $results =	mysqli_query($con,$sql); //execute the query
                            while($data=mysqli_fetch_array($results,MYSQLI_ASSOC)){ ?>
                                <div class="memo-item">
                                    <a href="broadcast_read.php?memo_id=<?php echo $data['id']; ?>" class="">
                                    <span class="date">
                                        <?php echo date("d  M \'y", strtotime($data['created_at'])); ?>
                                    </span>

                                        <h4><?php echo $data['title']?> &nbsp;<i class="zmdi zmdi-chevron-right"></i></h4>
                                        <p class="trim-text"><?php echo memoInfo::limit_text($data['body'])?> </p>

                                        <?php

                                        $memo_id=$data['id'];
                                        $sql2 = "SELECT * FROM broadcast_attachment WHERE memo_id='$memo_id' ";
                                        $attachments_result = mysqli_query($con,$sql2);
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
                                </div>

                            <?php } } ?>
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