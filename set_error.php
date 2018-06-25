<?php
    include("includes/notify.php");

    Notify::restore();

    Notify::set_error("Something is really wrong!");
    // Notify::set_success("Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore sapiente voluptatem facili");
    header("location: index.php");