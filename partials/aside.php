<aside>
    <a id="logo" href="/" class="layout vertical center">
        <div id="logoImage">
            <img src="img/square_logo.png" alt="">
        </div>
        <span id="logoText" href="/" class="layout center">IFM Smart Memo</span>
    </a>

    <ul>


        <?php if(isset($_SESSION['user_role_id'])  && $_SESSION['activation'] ==1 ){
            $perms2=checkPermission::verifyPermission($con,$_SESSION['user_role_id'],'System Management');
            if($perms2 ==1){?>
                <li class="<?php is_active_page(['dashboard', 'index2']); ?>">
                    <a href="index2.php">
                        <i class="zmdi zmdi-view-dashboard"></i>Dashboard
                    </a>
                </li>
            <?php }else{ ?>
                <li class="<?php is_active_page(['home', 'index']); ?>">
                    <a href="index.php">
                        <i class="zmdi zmdi-home"></i> Home
                    </a>
                </li>
            <?php } ?>

            <?php
            $perms3=checkPermission::verifyPermission($con,$_SESSION['user_role_id'],'Memo BroadCast');
            if($perms3 ==1){?>
                <li class="dropdown">
                    <a href="#">
                        <i class="zmdi zmdi-file"></i>
                        Broadcasts
                    </a>

                    <ul class="dropdown-menu">
                        <li class="">
                            <a href="broadcast_memo.php">Create Broadcast</a>
                        </li>
                        <li class="">
                            <a href="allbroadcasts.php">View Broadcasts</a>
                        </li>
                    </ul>
                </li>

            <?php } ?>

            <li class="<?php is_active_page(['create_memo', 'view_mymemo', 'memo-drafts', 'sent_memos']); ?> dropdown">
                <a href="#">
                    <i class="zmdi zmdi-file"></i>
                    My Memos
                </a>

                <ul class="dropdown-menu">
                    <li class="<?php is_active_page(['create_memo']); ?>">
                        <a href="create_memo.php">Create Memo</a>
                    </li>


                    <li class="<?php is_active_page(['memo-inbox']); ?>">
                        <a href="memo-inbox.php">Inbox Memos</a>
                    </li>
                    <li class="<?php is_active_page(['view_mymemo']); ?>">
                        <a href="memo-ufsd.php">Pending Memos</a>
                    </li>
                    <li class="<?php is_active_page(['memo-drafts']); ?>">
                        <a href="memo-drafts.php">Memo Drafts</a>
                    </li>
                    <li class="<?php is_active_page(['sent_memos']); ?>">
                        <a href="sent_memos.php">Sent Memos</a>
                    </li>
                </ul>
            </li>
            <?php
            //admin only
            $perms=checkPermission::verifyPermission($con,$_SESSION['user_role_id'],'System Management');
            if($perms ==1){?>
                <li class="<?php is_active_page(['departments', 'view_dept']); ?>">
                    <a href="view_dept.php">
                        <i class="zmdi zmdi-accounts-list-alt"></i> Departments
                    </a>
                </li>

                <li class="<?php is_active_page(['view_jobs']); ?>">
                    <a href="view_jobs.php">
                        <i class="zmdi zmdi-case"></i> Job Titles
                    </a>
                </li>

                <li class="<?php is_active_page(['staff']); ?>">
                    <a href="staff.php">
                        <i class="zmdi zmdi-accounts"></i> Staff List
                    </a>
                </li>

                <li class="" >
                    <a href="role-management.php">
                        <i class="zmdi zmdi-accounts-list-alt"></i> User Roles
                    </a>
                </li>

            <?php } ?>
        <?php } ?>
        <li>
            <a href="logout.php">
                <i class="zmdi zmdi-sign-in" style="transform: rotateY(-180deg) translateX(10px)"></i> Logout
            </a>
        </li>
    </ul>
</aside>