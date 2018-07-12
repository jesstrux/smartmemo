<?php
$no_bootstrap = true;
$css_file = "memo_read.css";
include("partials/header.php");

include("includes/getMemo.php");
include("includes/getUsers.php");
include("includes/getAttachment.php");
include("includes/getUfs.php");


if(isset($_POST['respondToMemo'])){
    $actionRadio=$_POST['actionRadio'];
    $memoId=$_POST['memoId'];
    $comment=$_POST['body'];

    //getUFSid
    $userId=$_SESSION['user_id'];
    $sql = "SELECT id FROM memo_ufs WHERE user_id='$userId' and memo_id='$memoId' ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $ufs_id=$row['id'];

    $sql="INSERT INTO memo_response (memo_id,ufs_id,comment,action ) values ('$memoId','$ufs_id','$comment','$actionRadio')";

  if ($con->query($sql) === TRUE) {
      //set this ufs responded to memo
      $update="UPDATE memo_ufs SET status=1 WHERE id=$ufs_id";
      if ($con->query($update) === TRUE) {
          header('location:memo-ufsd.php');
      }
}
}
?>
<link rel="stylesheet" href="css/staff_home.css">

<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php"); ?>

    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php"); ?>

        <div id="mainContent">

            <?php
            $user_id= $_SESSION['user_id'];
            $result=getMemo::byId($con, $_GET['memo_id'], $user_id);
            $memo = mysqli_fetch_assoc($result);
            ?>

            <section class="page-title layout vertical center-center">
                <h1 class="text-light">
                    <?php echo $memo['title']; ?>
                </h1>
                <small class="text-light">
                    <?php echo $memo['sent'] ? 'Sent To' : 'From' ?>:
                    <a href="profile.php?user_id=<?php echo $memo['other_user_id']; ?>"
                       class="link user-link">
                        <?php echo getUsers::getFullname($con, $memo['other_user_id']) ?>
                    </a>

                    <?php
                    $ufs_result = getUfs::fromMemo($con, $memo['id']);
                    $row_count = mysqli_num_rows($ufs_result);
                    if($row_count > 0){
                        echo "</br> Ufs:";
                    }
                    $ufs_count = 1;
                    while ($ufs = mysqli_fetch_array($ufs_result)) {
                        echo '<a href="profile.php?user_id='. $ufs['user_id'] .'" class="link user-link">';
                        echo getUsers::getFullname($con, $ufs['user_id']);
                        echo '</a>';

                        echo (($ufs_count != $row_count) ? "," : "");

                        $ufs_count++;
                    };
                    ?>
                    <br>
                    <?php echo $memo['sent'] ? 'Sent' : 'Received' ?> On:
                    <?php echo date("F jS Y", strtotime($memo['created_at'])); ?>
                </small>
            </section>
            <div class="section-wrapper">
                <section>
                    <div id="memoContent">
                        <?php $currentUfs=memoInfo::currentUfs($con,$_GET['memo_id']);
                        if($currentUfs == $_SESSION['user_id']){?>
                        <div id="memoOption">
                            <button class="rounded-btn btn btn-success" onclick="openModal('createMemo');">Action</button>
                        </div>
                        <?php } ?>
                        <div id="memoBody">
                            <?php echo nl2br($memo['body']); ?>
                        </div>

                        <?php
                        $attachments_result = getAttachment::fromMemo($con, $memo['id']);

                        echo '<div id="attachments">';
                        while ($attachment = mysqli_fetch_array($attachments_result)) {
                            $ext = end(explode(".",$attachment['document']));
                            $type = $ext;
                            if(in_array($ext, ["jpg", "png", "gif", "jpeg"]))
                                $type = "image";

                            echo '
										<a href="uploads/'. $attachment['document'] .'" class="attachment '.$type.'" target="blank">
											<i class="zmdi"></i>
											<span class="trim-text">'. $attachment['document'] .'</span>
										</a>
									';
                        };

                        echo '</div>';
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

<?php include("partials/modal.php"); ?>
<?php include("partials/js.php"); ?>
<script>
    function saveMemo(){
        closeModal('createMemo');
        showToast("Memo successfully saved!", 'top-center');
    }
    function openModal(id){
        document.getElementById(id).classList.add('open');
    }
    function closeModal(id){
        document.getElementById(id).classList.remove('open');
    }
</script>
</body>
</html>