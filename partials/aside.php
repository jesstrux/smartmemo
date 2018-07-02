<aside>
    <a id="logo" href="/" class="layout vertical center">
        <div id="logoImage">
            <img src="img/logo.png" alt="">
        </div>
        <span id="logoText" href="/" class="layout center">IFM Smart Memo</span>
    </a>

    <ul>
        <li class="<?php is_active_page(['home', 'index']); ?>">
            <a href="index.php">
                <i class="zmdi zmdi-home"></i> Home
            </a>
        </li>
        <li class="<?php is_active_page(['dashboard', 'index2']); ?>">
            <a href="index2.php">
                <i class="zmdi zmdi-view-dashboard"></i>Dashboard
            </a>
        </li>

        <li class="<?php is_active_page(['create_memo', 'view_mymemo', 'memo-drafts', 'sent_memos']); ?> dropdown">
            <a href="#">
                <i class="zmdi zmdi-file"></i>
                My Memos
            </a>

            <ul class="dropdown-menu">
                <li class="<?php is_active_page(['create_memo']); ?>">
                    <a href="create_memo.php">Create Memo</a>
                </li>
                <li class="<?php is_active_page(['view_mymemo']); ?>">
                    <a href="view_mymemo.php">Inbox Memos</a>
                </li>
                <li class="<?php is_active_page(['memo-drafts']); ?>">
                    <a href="memo-drafts.php">Memo Drafts</a>
                </li>
                <li class="<?php is_active_page(['sent_memos']); ?>">
                    <a href="sent_memos.php">Sent Memos</a>
                </li>
            </ul>
        </li>

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
        <li>
            <a href="logout.php">
                <i class="zmdi zmdi-sign-in" style="transform: rotateY(-180deg) translateX(10px)"></i> Logout
            </a>
        </li>
    </ul>
</aside>