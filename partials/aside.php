<aside>
    <a id="logo" href="/" class="layout vertical center">
        <div id="logoImage">
            <img src="img/square_logo.png" alt="">
        </div>
        <span id="logoText" href="/" class="layout center">IFM Smart Memo</span>
    </a>

    <ul>
        <li class="<?php 
                is_active_page(['home', 'index']);?>">
            <a href="index.php">
                <i class="zmdi zmdi-home"></i> Home
            </a>
        </li>
        <li style="display: none;" class="<?php is_active_page(['dashboard', 'index2']); ?>">
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

        <?php 
            if(Auth::isAdmin()){
                include('admin_menu_options.php');
            }
        ?>
        <li>
            <a href="logout.php">
                <i class="zmdi zmdi-sign-in" style="transform: rotateY(-180deg) translateX(10px)"></i> Logout
            </a>
        </li>
    </ul>
</aside>