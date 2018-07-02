<?php
    // $no_bootstrap = true;
    include("partials/header.php");
?>
<?php include("includes/getUsers.php");?>
<link rel="stylesheet" href="css/staff_home.css">

<script src="ckeditor/ckeditor.js"></script>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-edit"></i>
                <h1 class="text-light">Create Memo</h1>
                <small class="text-light">Fill in the fields then click a button to create a memo or save a draft.</small>
            </section>
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <section>
                    <form class="classic-form plvr" method="post" action="includes/memo_sd.php" autocomplete="off">
                        <div class="form-group hidden">
                            <label for="title">Memo Reference #</label>
                            <?php
                                date_default_timezone_set('Africa/Dar_es_Salaam');
                                $ref_id = "MEMO" . date('Ymdhis')
                            ?>
                            <input class="form-control" value="<?php echo $ref_id; ?>" type="text" disabled>
                            <input name="ref_id" value="<?php echo $ref_id; ?>" type="hidden">
                        </div>

                        <div class="form-group hidden">
                            <label for="title">From</label>
                            <input name="from" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" type="text" disabled>
                            <input name="fromid" value="<?php echo $_SESSION['user_id']; ?>" type="hidden">
                        </div>

                        <div class="input-group">
                            <label>Memo Type</label>

                            <div class="flex layout">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" type="radio"> &nbsp;Internal memo
                                    </label>
                                </div>
                                &emsp;

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1"  type="radio" required>&nbsp;
                                        Private memo
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label for="memoto">Memo Recepient</label>
                            <select name="to" id="memoto" required>
                                <option value="">Select receiver</option>
                                <?php
                                        $query = "SELECT * FROM users";
                                        $result = mysqli_query($con, $query); //execute the query
                                        while ($data = mysqli_fetch_assoc($result)) {
                                            if ($_SESSION['user_id'] != $data['id']) {
                                                ?>
                                            <option value="<?php echo $data['id'] ?>">
                                                <?php echo ucwords($data['fname'] . ' ' . $data['mname'] . ' ' . $data['surname']) ?>
                                            </option>
                                        <?php 
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="title" classs="start">
                                Memo UFS
                                <small><strong>TIP:</strong> Delivery will be follow order</small>
                            </label>
                            
                            <input name="title" placeholder="Type to add UFS" type="text" required>
                        </div>

                        <div class="input-group">
                            <label for="title">Memo Subject</label>
                            <input name="title" placeholder="Enter memo subject here" type="text" required>
                        </div>

                        <div class="input-group">
                            <label for="body" class="start">Memo Content</label>
                            <textarea name="body" placeholder="Enter memo content here"  rows="10" required></textarea>
                        </div>

                        <br>

                        <div class="input-group layout center-justified">
                            <button type="submit" class="rounded-btn imperfect" name="draft">Save Draft</button>
                            <button type="submit" class="rounded-btn btn-success imperfect" name="save">Send Memo</button>
                        </div>
                    </form>
                </section>
            </div>
            <footer class="layout center-justified">
                Coyright &copy; Smart Memo 2018
            </footer>
        </div>
    </div>
</main>
<?php include ("partials/js.php"); ?>
<!-- <script> CKEDITOR.replace( 'memoeditor' )</script> -->
</body>
</html>