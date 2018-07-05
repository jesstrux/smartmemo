<header class="for-lg">
    <div class="layout center justified">
        <div></div>

        <nav class="layout center">
            <!-- <a href="#" class="nav-icon">
                <i class="zmdi zmdi-notifications"></i>
            </a> -->

            <a href="create_memo.php" class="rounded-btn">Create A Memo</a>

            <div id="user-dropdown">
                <a id="userAcc" href="#" class="layout center-center">
                    <!-- <span class="dp layout center-center">
                        <i class="zmdi zmdi-account"></i>
                    </span> -->
                    <img class="dp" src>
                    <?php echo $_SESSION['fullname']?>
                    <i class="zmdi zmdi-chevron-down"></i>
                </a>

                <div id="dropdown">
                    <div id="dropdownContent">
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>