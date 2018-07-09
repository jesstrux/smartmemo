<?php
    include("includes/session.php");
    include("includes/auth.php");
    include("includes/notify.php");
    include("includes/connection.php");
    include("includes/functions.php");
    
    $cur_file_array = explode('/', $_SERVER['SCRIPT_FILENAME']);
    $cur_file = $cur_file_array[count($cur_file_array) - 1];
    set_page(substr($cur_file, 0, strlen($cur_file) - 4));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Memo IFM</title>
    <meta name="theme-color" content="#003a75">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003a75">
    <meta name="theme-color" content="#003a75">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003a75">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/flexboxgrid.min.css">
    <link rel="stylesheet" href="css/flex.css">
    
    <?php if(!isset($no_bootstrap))
        echo '
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="css/custom.css">
        ';

        if(isset($css_file)){
            echo '<link rel="stylesheet" href="css/'.$css_file.'">';
        }
    ?>

    <link rel="stylesheet" href="css/staff_home.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
        aside{
            background: #1e4771;
            color: #fff;
        }

        aside ul{
            color: #b3c8de;
        }

        aside ul li a {
            border-left-width: 3px;
        }

        aside ul li.active a {
            background: #1c4269;
            border-left-color: #4c87c3;
            color: #7db1e4;
        }

        aside ul li.active a i{
            color: #78a9da;
        }

        aside .dropdown .dropdown-menu {
            position: relative;
            margin-top: -0.5em;
            background: #1b3a5a;
            padding-top: 0.8em;
            padding-bottom: 0.8em;
        }

        aside .dropdown .dropdown-menu a{
            color: #7591ad;
        }

        aside .dropdown .dropdown-menu li.active a {
            color: #b2cce6;
        }

        .page-title i {
            background: #1f4770;
            color: #fff;
        }
    </style>
    <link rel="icon" href="logo.png">
</head>