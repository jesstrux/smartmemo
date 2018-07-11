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
        $sql = "INSERT INTO job (name) VALUES ('$name')";

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
                <i class="zmdi zmdi-case"></i>
                <h1 class="text-light">All Job Titles</h1>
            </section>
            <div class="section-wrapper">
                <!-- Page content goes here-->

                <section style="margin-top: -1em">
                    <div class="layout justified start">
                        <div class="flex add-box">
                            <h2 class="text-light">Add Job Title</h2>
                            
                            <form method="post" autocomplete="off">
                                <div class="input-group">
                                    <!-- <label for="title">Job title</label> -->
                                    <input id="title" name="dept" placeholder="Enter title here" type="text" required>
                                </div>

                                <button type="submit" class="rounded-btn imperfect btn-success" name="save">Save Job title</button>
                            </form>
                        </div>

                        <div class="flex table-box">
                            <table>
                                <thead>
                                    <th class="text-center" style="width: 60px; padding: 1.5em 0.6em">S/N</th>
                                    <th style="width:69%; padding-left: 2em">Job title</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>

                                <?php
                                    $query = "SELECT * FROM job";
                                    $i = 1;
                                    $result = mysqli_query($con, $query);

                                    while ($data = mysqli_fetch_assoc($result)) { 
                                        if($data['status'] == 0) continue;?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?>.</td>
                                            <td style="padding-left: 2em"><?php echo $data['name']; ?></td>
                                            <td class="text-center">
                                                <button class="rounded-btn btn-sm imperfect btn-danger" onclick="deleteItem('<?php echo $data['id'];?>')">Remove</button>
                                            </td>
                                        </tr>
                                        <?php $i++;
                                    } 
                                ?>
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
            echo 'showToast("Job was Successfully Saved.", "success");'
    ?>
    function deleteItem(id){
        var data = {
            id: id,
            table: 'Job'
        };

        ajax("api/delete_admin_data.php", data)
			.then(function(res){
				showToast("Job Successfully Removed.", "success");

				setTimeout(() => {
					window.location.reload();
				}, 500);
			})
			.catch(function (err) {
				if(err)
					console.log("Error: " + err);
				showToast("Failed to delete department.", "error");
			})
    }
</script>
</html>