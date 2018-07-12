<?php
    include("../includes/connection.php");

    $id = $_GET['user_id'];

    mysqli_query($con, "UPDATE users SET device_token = '' WHERE id = $id");

    echo "success";