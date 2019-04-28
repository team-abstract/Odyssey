<?php

    session_start();
    function isLoggedIn() {
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
    }

    if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.html');
    }

    if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.html");
    }

?>
