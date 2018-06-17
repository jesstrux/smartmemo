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

        <li class="<?php is_active_page(['create_memo', 'view_mymemo']); ?> dropdown">
            <a href="#">
                <i class="zmdi zmdi-file"></i>
                My Memos
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="create_memo.php" class="<?php is_active_page(['create_memo']); ?>">Create Memo</a>
                </li>
                <li>
                    <a href="view_mymemo.php" class="<?php is_active_page(['view_mymemo']); ?>">View Memo</a>
                </li>
                <!-- <li><a href="memo-drafts.html">Memo Drafts</a></li> -->
            </ul>
        </li>

        <li>
            <a href="view_dept.php" class="<?php is_active_page(['departments']); ?>">
                <i class="zmdi zmdi-accounts-list-alt"></i> Departments
            </a>
        </li>
        <li>
            <a href="view_jobs.php" class="<?php is_active_page(['view_jobs']); ?>">
                <i class="zmdi zmdi-case"></i> Job Titles
            </a>
        </li>

        <li>
            <a href="staff.php" class="<?php is_active_page(['staffs']); ?>">
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