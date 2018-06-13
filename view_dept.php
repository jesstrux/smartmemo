<?php include("partials/header.php");?>
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
            <div class="section-wrapper">
                <!-- Page content goes here-->

                <section>
                    <?php if($squery_status==1){?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Success!</strong> Department is Successfully Saved.
                        </div>
                    <?php }?>
                    <?php if($squery_status==2){?>
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Error!</strong> Department is not Successfully Saved.
                        </div>
                    <?php }?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Add new Departiment</div>
                                <div class="panel-body">
                                    <form class="plvr" method="post" autocomplete="off">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="title">Department name</label>
                                                <input name="dept" class="form-control" placeholder="Enter depatiment name" type="text" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg" name="save">Save department</button>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="panel-footer"></div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Departments list</div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM department";
                                            $i=1;
                                            $result =	mysqli_query($con, $query); //execute the query
                                            while($data	=	mysqli_fetch_assoc($result)){ ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['name']; ?></td>
                                                <td>
                                                    <button class="btn btn-danger btn-xs">DELETE</button>
                                                </td>
                                            </tr>
                                                <?php $i++; } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer"></div>
                            </div>


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
</html>