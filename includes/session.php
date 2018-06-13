<?php
session_start();

//check if the user has logged into the system
if(empty($_SESSION['user_id'])){
	header("location: login.php");
}
?>