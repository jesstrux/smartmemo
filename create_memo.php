<?php include("partials/header.php");?>
<?php include("includes/getUsers.php");?>
<script src="ckeditor/ckeditor.js"></script>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <div class="section-wrapper">
                <!-- Page content goes here-->
                <section>
                    <form class="plvr" method="post" action="includes/memo_sd.php" autocomplete="off">
                        <fieldset>
                            <div class="form-group">
                                <label for="title">Memo Reference #</label>
                                <?php
                                date_default_timezone_set('Africa/Dar_es_Salaam');
                                $ref_id="MEMO".date('Ymdhis')?>
                                <input class="form-control" value="<?php echo $ref_id; ?>" type="text" disabled>
                                <input name="ref_id" value="<?php echo $ref_id; ?>" type="hidden">
                            </div>

                            <fieldset class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                                        Internal memo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1"  type="radio" required>
                                        Private memo
                                    </label>
                                </div>

                            </fieldset>
                            <div class="form-group">
                                <label for="title">From</label>
                                <input name="from" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" type="text" disabled>
                                <input name="fromid" value="<?php echo $_SESSION['user_id']; ?>" type="hidden">
                            </div>

                            <div class="form-group">
                                <label for="memoto">To</label>
                                <select name="to"  class="form-control" id="memoto" required>
                                    <option value="">Select receiver</option>
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $result =	mysqli_query($con, $query); //execute the query
                                    while($data	=	mysqli_fetch_assoc($result)){
                                        if($_SESSION['user_id'] !=$data['id']){
                                        ?>
                                        <option value="<?php echo $data['id']?>">
                                            <?php echo ucwords($data['fname'].' '.$data['lname'].' '.$data['surname'])?>
                                        </option>
                                    <?php } }?>

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="title">Memo UFS</label>
                                    <button class="btn btn-small btn-success ufs-btn" title="Click to Add UFS">Add UFS</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title">Memo Subject</label>
                                <input name="title" class="form-control"  placeholder="write memo subject" type="text" required>
                            </div>

                            <div class="form-group">
                                <label for="body">Memo Message</label>
                                <textarea name="body" id="memoeditor" class="form-control" placeholder="Enter memo message"  rows="3" required></textarea>
                            </div>




                            <button type="submit" class="btn btn-warning btn-lg" name="draft">Save Draft</button>
                            <button type="submit" class="btn btn-primary btn-lg" name="save">Save & Send</button>
                        </fieldset>
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
<script>
    CKEDITOR.replace( 'memoeditor' );
</script>
</body>
</html>