<?php
    $no_bootstrap = true;
    include("partials/header.php");
    
    include("includes/getUsers.php");

    $user_query = "SELECT * FROM users";
    $user_result = mysqli_query($con, $user_query); //execute the query

    $users = [];
    while ($user = mysqli_fetch_assoc($user_result)) {
        if ($_SESSION['user_id'] != $user['id'])
            $users[] = ["id" => $user['id'], "name" => ucwords($user['fname'] . ' ' . $user['mname'] . ' ' . $user['surname'])];
    }
?>
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
                        <form id="memoForm" class="classic-form plvr" method="post" action="includes/memo_sd.php" autocomplete="off">
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
                                    <option value="">Select recepient</option>
                                    <?php
                                        foreach ($users as $user) {
                                            echo '<option value = "'.$user['id'].'">';
                                            echo $user['name'] . '</option>';
                                        };
                                    ?>
                                </select>
                            </div>

                            <input id="ufs" name="ufs" type="hidden" value="1, 3, 5">

                            <div class="input-group">
                                <label class="start">
                                    Memo UFS
                                    <small><strong>TIP:</strong>Memo delivery will follow order</small>
                                </label>
                                
                                <div id="ufsList" class="flex layout center wrap">
                                    <div id="ufsChips" class="layout inline wrap center"></div>

                                    <div id="ufsAdder">
                                        <input class="unstyled" type="text" id="ufsFilter" placeholder="Type to add user">
                                        <div id="ufsDropdown"></div>
                                    </div>

                                    <button class="chip-btn"><i class="zmdi zmdi-plus"></i>&nbsp;&nbsp;&nbsp;Add User&nbsp;&nbsp;</button>
                                </div>

                                <script>
                                    var users = JSON.parse('<?php echo json_encode($users)?>');
                                    var chosen_users = [];
                                    function chip_tpl(user){
                                        return `
                                            <div class="chip" data-id="${user.id}">
                                                <img src="">
                                                <em>${user.name}</em>
                                                <span class="closebtn" onclick="removeUserFromUfs(this.parentElement)">&times;</span>
                                            </div>
                                        `;
                                    }

                                    function chip_tpl(user){
                                        return `
                                            <div class="chip" data-id="${user.id}">
                                                <img src="">
                                                <em>${user.name}</em>
                                                <span class="closebtn" onclick="removeUserFromUfs(this.parentElement)">&times;</span>
                                            </div>
                                        `;
                                    }

                                    function addUserToUfs(user){
                                        var template = document.createElement('template');
                                        var chip = chip_tpl(user).trim();
                                        template.innerHTML = chip;

                                        chosen_users.push(user.id);

                                        document.querySelector('#ufsChips').appendChild(template.content.firstChild);

                                        setUfsDropdownUsers();
                                    }

                                    function user_item_tpl(user){
                                        return `
                                            <div class="ufs-item">
                                                <img src="" class="for-user">
                                                ${user.name}
                                            </div>
                                        `;
                                    }

                                    function addUserToDropdown(user){
                                        var template = document.createElement('template');
                                        var user_item = user_item_tpl(user).trim();
                                        template.innerHTML = user_item;
                                        var el = template.content.firstChild;
                                        el.onclick = function(){
                                            addUserToUfs(user);
                                        }

                                        document.querySelector('#ufsDropdown').appendChild(el);
                                    }

                                    function setUfsDropdownUsers(){
                                        console.log(users.length == chosen_users.length);

                                        if(users.length === chosen_users.length){
                                            document.querySelector("#ufsAdder").style.display = "none";
                                            return;
                                        }

                                        document.querySelector("#ufsAdder").style.display = "flex";
                                        document.querySelector('#ufsDropdown').innerHTML = "";
                                        var d_users = users.filter(user => chosen_users.indexOf(user.id) == -1);
                                        d_users.forEach(user => {
                                            addUserToDropdown(user);
                                        });

                                        var ufs = document.getElementById("ufs");
                                        ufs.value = chosen_users.join(", ");
                                    }

                                    // users.forEach(user => {
                                    //     addUserToUfs(user);
                                    // });
                                    setUfsDropdownUsers();

                                    function removeUserFromUfs(el){
                                        var id = el.getAttribute("data-id");
                                        chosen_users.splice(chosen_users.indexOf(id), 1);
                                        setUfsDropdownUsers();

                                        var no_prev_sibling = (el.previousSibling == null || el.previousSibling.nodeName == "#text");
                                        var no_next_sibling = (el.nextSibling == null || el.nextSibling.nodeName == "#text");

                                        var last_one = (no_prev_sibling && no_next_sibling) ? true : false;

                                        document.querySelector('#ufsChips').removeChild(el);

                                        if(last_one)
                                            document.querySelector('#ufsChips').innerHTML = "";
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
                                </style>

                                <div class="flex">
                                    <div id="attachments"></div>

                                    <div id="dropAttachments" class="flex layout vertical center-center" style="border: 2px dashed #555;background: #fdfdfd; height: 200px;">
                                        
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
    <script src="js/filedrag.js"></script>
<!-- <script> CKEDITOR.replace( 'memoeditor' )</script> -->
</body>
</html>