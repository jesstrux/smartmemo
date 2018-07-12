<?php
	include("includes/send_notification.php");
	header('Content-Type: application/json');
	echo json_encode(['ok' => true]);
	fastcgi_finish_request();

	$topic = "Admin";
    $title = "New User Registered!";
    $message = "Jemimah has registered to Smart Memo, please confirm them.";
    notify_topic($topic, $title, $message);

    // phpinfo()