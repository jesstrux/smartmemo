<?php 
    $no_bootstrap = true;
    include("partials/header.php");
?>
<body class="show-na">
<main class="layout">
    <?php include("partials/aside.php");
    $squery_status=0;
    if(isset($_POST['save'])){
        $name=$_POST['dept'];
        $sql = "INSERT INTO department (name) VALUES ('$name')";

        if ($con->query($sql) === TRUE) {
           //success
            $squery_status=1;
        } else {
            //failed
            $squery_status=2;
        }
    }
    ?>
    <div id="siteContent" class="flex">
        <?php include("partials/navbar.php");?>
        <div id="mainContent">
            <section class="page-title layout vertical center-center">
                <i class="zmdi zmdi-accounts-list-alt"></i>
                <h1 class="text-light">Departments</h1>
            </section>

            <div class="section-wrapper">
                <section>
                    <div class="layout start justified">
                        <div class="add-box flex">
                            <h2 class="text-light">Add Department</h2>
                            
                            <form method="post" autocomplete="off">
                                <div class="input-group">
                                    <!-- <label for="dept">Department name</label> -->
                                    <input id="dept" name="dept" placeholder="Enter dept name here" type="text" required>
                                </div>
                                <button type="submit" class="rounded-btn btn-sm imperfect btn-success" name="save">SUBMIT</button>
                            </form>
                        </div>
                        <div class="flex table-box">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th class="text-center" style="width: 60px; padding: 1.5em 0.6em">S/N</th>
                                    <th style="width:59%; padding-left: 2em">Department</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM department";
                                        $i = 1;
                                        $result = mysqli_query($con, $query); //execute the query
                                        while ($data = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td style="padding-left: 2em"><?php echo $data['name']; ?></td>
                                            <td class="text-center">
                                                <button class="rounded-btn btn-sm imperfect btn-danger"
                                                    onclick="removeAdminItem(<?php echo $data['id']; ?>, 'Department')">REMOVE</button>
                                            </td>
                                        </tr>
                                        <?php $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
            <footer class="layout center-justified">
                Coyright &copy; Smart Memo 2018
            </footer>
        </div>
    </div>
</main>
<?php include ("partials/js.php"); ?></body>

<script>
    <?php 
        if ($squery_status == 1)
            echo 'showToast("Department is Successfully Saved.", "success");'
    ?>
</script>
</html>