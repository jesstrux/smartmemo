<?php
$no_bootstrap = true;
$css_file = "memo_read.css";
include("partials/header.php");

include("includes/getMemo.php");
include("includes/getUsers.php");
include("includes/getAttachment.php");
include("includes/getUfs.php");
?>
<link rel="stylesheet" href="css/staff_home.css">

<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php"); ?>

    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php"); ?>

        <div id="mainContent">

            <?php
            $dept_id= $_SESSION['dept_id'];
            $sql="SELECT * FROM broadcast WHERE dept_id='$dept_id' ";
            $results =	mysqli_query($con,$sql); //execute the query
            $memo=mysqli_fetch_array($results,MYSQLI_ASSOC);

            ?>

            <section class="page-title layout vertical center-center">
                <h1 class="text-light">
                    <?php echo $memo['title']; ?>
                </h1>

            </section>
            <div class="section-wrapper">
                <section>
                    <div id="memoContent">
                        <div id="memoBody">
                            <?php echo nl2br($memo['body']); ?>
                        </div>

                        <?php
                        $memo_id=$memo['id'];
                        $sql2 = "SELECT * FROM broadcast_attachment WHERE memo_id='$memo_id' ";
                        $result = mysqli_query($con,$sql2);

                        echo '<div id="attachments">';
                        while ($attachment = mysqli_fetch_array($result)) {
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