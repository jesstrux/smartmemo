<?php
$no_bootstrap = true;

include("partials/header.php");
include('includes/getDepartment.php');
include('includes/getJob.php');
include('includes/getRole.php');

if(isset($_GET['memo_id'])){
    $memo_id=$_GET['memo_id'];
}
?>

<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-accounts"></i>
                <h1 class="text-light">Memo Response</h1>
            </section>
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <section>
                    <table style="margin-top: -1em;">
                        <thead>
                        <tr>
                            <th>UFS</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                         $memoResponse=memoInfo::getMemoResponse($con,$memo_id);
                         while($row = mysqli_fetch_array($memoResponse,MYSQLI_ASSOC)){ ?>
                             <tr>
                                 <td><?php echo memoInfo::getUfsName($con,$row['ufs_id'])?></td>
                                 <td><?php echo $row['comment']?></td>
                                 <td><?php if($row['action'] ==1)echo 'Approved'; if($row['action'] ==0)echo 'Declined'; ?></td>
                             </tr>
                        <?php } ?>

                        </tbody>
                    </table>
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