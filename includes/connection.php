<?php
$con = mysqli_connect("127.0.0.1","root","","smartmemo2");
$con->set_charset('utf8mb4');
// $con = mysqli_connect("localhost","root","","smartmemo");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>