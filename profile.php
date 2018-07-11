<?php
    $no_bootstrap = true;
    include("includes/connection.php");
    include("partials/header.php");
    include('includes/getDepartment.php');
    include('includes/getJob.php');
    include('includes/getUsers.php');

    if(isset($_GET['user_id'])){
        $user = getUsers::byId($con, $_GET['user_id']);
    }
    else if(isset($_SESSION['user_id'])){
        $user = getUsers::byId($con, $_SESSION['user_id']);
    }
?>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-account"></i>
                <h1 class="text-light">
                    <?php echo $user['fullname']; ?>
                </h1>
            </section>
            <div class="section-wrapper">
                <table class="table" style="margin-top: -1em;max-width: 1000px; margin: auto">
                    <thead>
                        <tr>
                            <th>FIRST NAME</th>
                            <th>MIDDLE NAME</th>
                            <th>LAST NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>DEPARTMENT</th>
                            <th>POSITION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $user['fname']; ?></td>
                            <td><?php echo $user['mname']; ?></td>
                            <td><?php echo $user['surname']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['phoneNumber']; ?></td>
                            <td><?php echo getDepartment::getdept($con, $user['dept_id']); ?></td>
                            <td><?php echo getJob::getjobs($con, $user['job_id']); ?></label>
                        </tr>
                    </tbody>
                </table>
            </div>
            <footer class="layout center-justified">
                Coyright &copy; Smart Memo 2018
            </footer>
        </div>
    </div>
</main>
<?php include ("partials/js.php"); ?>
</body>
</html>