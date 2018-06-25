<?php
    include("includes/session.php");
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
    <link rel="icon" href="logo.png">
</head>