<header class="for-lg">
    <div class="layout center justified">
        <div></div>

        <nav class="layout center">
            <!-- <a href="#" class="nav-icon">
                <i class="zmdi zmdi-notifications"></i>
            </a> -->

            <a href="create_memo.php" class="rounded-btn">Create A Memo</a>

            <a id="userAcc" href="profile.php" class="layout center-center">
                <span class="dp layout center-center">
                    <i class="zmdi zmdi-account"></i>
                </span>
                <?php echo $_SESSION['fullname']?>
            </a>
        </nav>
    </div>
</header>