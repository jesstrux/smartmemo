<?php
    $no_bootstrap = true;
    include("partials/header.php");
    include("includes/getUsers.php");
    include("includes/getDepartment.php");


?>
<body class="show-na">
    <main class="layout">
        <?php include("partials/aside.php");?>
        <div id="siteContent" class="flex">
            <?php include("partials/navbar.php");?>
            <div id="mainContent">
                <section class="page-title layout vertical center-center">
                    <i class="zmdi zmdi-edit"></i>
                    <h1 class="text-light">Broadcast Memo</h1>
                    <small class="text-light">Fill in the fields then click a button to create a memo</small>
                </section>
                <div class="section-wrapper">
                    <!-- Page content goes here-->
                    <section>
                        <form id="memoForm" class="classic-form plvr" method="post" action="includes/memo_broadcast.php" autocomplete="off">
                            <?php
                                date_default_timezone_set('Africa/Dar_es_Salaam');
                                $ref_id = "MEMO" . date('Ymdhis')
                            ?>
                            <input name="ref_id" value="<?php echo $ref_id; ?>" type="hidden">
                            <input name="fromid" value="<?php echo $_SESSION['user_id']; ?>" type="hidden">

                            <div class="input-group">
                                <label>Memo Type</label>

                                <div class="flex layout">
                                    <label>Memo Broadcasting</label>
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <label for="memoto">Memo Recepient</label>
                                <select name="memoto[]" id="memoto" required multiple>
                                    <option value="">Select recepient department</option>
                                    <?php
                                        $depts=getDepartment::getdepts($con);
                                        while($row=mysqli_fetch_array($depts,MYSQLI_ASSOC)){
                                            echo '<option value = "'.$row['id'].'">';
                                            echo $row['name'] . '</option>';
                                        }

                                    ?>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="title">Memo Subject</label>
                                <input name="title" placeholder="Enter memo subject here" type="text" required>
                            </div>

                            <div class="input-group">
                                <label for="body" class="start">Memo Content</label>
                                <textarea id="textarea" style="height: 156px" name="body" placeholder="Enter memo content here" required></textarea>
                            </div>

                            <div class="input-group">
                                <label class="start">
                                    Memo Attachments
                                    <small>
                                        <strong>TIP:</strong>  If you don't have attachments, ignore this part</small>
                                </label>

                                <style>
                                    #dropAttachments.hover{
                                        border-color: orange !important;
                                    }

                                    .attachment-remover{
                                        position: absolute;
                                        top: 0.5em;
                                        right: 0em;
                                        text-align: center;
                                        width: 20px;
                                        height: 20px;
                                        border-radius: 50%;
                                        background: #ddd;
                                        font-size: 0.7em;
                                        cursor: pointer;
                                    }

                                    .attachment-remover:hover{
                                        background: #ccc;
                                    }

                                    .attachment.loading .attachment-remover{
                                        opacity: 0;
                                        pointer-events: none;
                                    }
                                </style>

                                <div class="flex">
                                    <input id="savedAttachments" type="text" name="attachments" style="display: none;">
                                    <div id="attachments"></div>

                                    <script>
                                        function removeAttachment(e, file_name){
                                            var parent = parentUpTo(e.target, "div");
                                            deleteFile(file_name).then(function(){
                                                $id('attachments').removeChild(parent);
                                                var attachment_length = $id('attachments').querySelectorAll(".attachment").length;

                                                if(!attachment_length)
                                                    $id('attachments').innerHTML = "";

                                                var attachments_input = $id("savedAttachments");
                                                var savedAttachments = attachments_input.value.split(",");
                                                savedAttachments = savedAttachments.filter(function(a){
                                                    a != file_name
                                                });
                                                attachments_input.value = savedAttachments.join(",");
                                            });
                                        }
                                    </script>

                                    <div id="dropAttachments" class="flex layout vertical center-center" style="border: 2px dashed #555; border-radius: 4px; background: #fdfdfd; height: 200px;">
                                        
                                        Drop files here to attach to memo
                                        <br>
                                        <span style="margin: 0.5em 0">OR</span>
                                        <label style="padding: 0.7em 1em; background: #ddd;" for="pickAttachments">Pick Attachments</label>

                                    </div>

                                    <input type="file" id="pickAttachments" style="display: none;">
                                </div>
                            </div>

                            <br>

                            <div class="input-group layout center-justified">
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
    <script src="js/filedrag.js"></script>
    <script>
        var textarea = document.getElementById("textarea");
        var heightLimit = 500;

        textarea.oninput = function() {
            textarea.style.height = ""; /* Reset the height*/
            textarea.style.height = Math.min(textarea.scrollHeight, heightLimit) + "px";
        };
    </script>
<!-- <script> CKEDITOR.replace( 'memoeditor' )</script> -->
</body>
</html>