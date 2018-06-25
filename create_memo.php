<?php
    $no_bootstrap = true;
    include("partials/header.php");
?>
<?php include("includes/getUsers.php");?>
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
                            <?php
                                date_default_timezone_set('Africa/Dar_es_Salaam');
                                $ref_id = "MEMO" . date('Ymdhis')
                            ?>
                            <input name="ref_id" value="<?php echo $ref_id; ?>" type="hidden">
                            <input name="fromid" value="<?php echo $_SESSION['user_id']; ?>" type="hidden">

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
                                                    <?php echo ucwords($data['fname'] . ' ' . $data['lname'] . ' ' . $data['surname']) ?>
                                                </option>
                                            <?php 
                                        }
                                    } ?>
                                </select>
                            </div>

                            <input id="ufs" name="ufs" type="hidden" value="1, 3, 5">

                            <div class="input-group">
                                <label class="start">
                                    Memo UFS
                                    <small><strong>TIP:</strong>Memo delivery will follow order</small>
                                </label>
                                
                                <div id="ufsList" class="flex layout center wrap">
                                    <div class="chip" data-id="1">
                                        <img src="">
                                        <em>Baltazaar Manyulisyo</em>
                                        <span class="closebtn" onclick="removeUfs(this.parentElement)">&times;</span>
                                    </div>

                                    <div class="chip" data-id="3">
                                        <img src="">
                                        <em>Baltazaar Manyulisyo</em>
                                        <span class="closebtn" onclick="removeUfs(this.parentElement)">&times;</span>
                                    </div>

                                    <div class="chip" data-id="5">
                                        <img src="">
                                        <em>John Doe</em>
                                        <span class="closebtn" onclick="removeUfs(this.parentElement)">&times;</span>
                                    </div>

                                    <button class="chip-btn"><i class="zmdi zmdi-plus"></i>&nbsp;&nbsp;&nbsp;Add User&nbsp;&nbsp;</button>
                                </div>

                                <script>
                                    function removeUfs(el){
                                        var id = el.getAttribute("data-id");

                                        var ufs = document.getElementById("ufs");
                                        var ufs_users = ufs.value.split(", ");
                                        var new_ufs_users = ufs_users.filter(u => {
                                            return u != id;
                                        });
                                        console.log(id, new_ufs_users);

                                        ufs.value = new_ufs_users.join(", ");

                                        document.querySelector('#ufsList').removeChild(el);
                                    }
                                </script>
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