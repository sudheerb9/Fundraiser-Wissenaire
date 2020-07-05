<?php
    session_start();
	require_once "Google_API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("96689537530-jkk11ojp0i4r1ffq7q6u8idamsm59c9j.apps.googleusercontent.com");
	$gClient->setClientSecret("NtXKC_Ba8lAWJGuysBU3ADXm");
	$gClient->setApplicationName("Wissenaire'21 Fundraiser");
	$gClient->setRedirectUri("http://fundraiser.wissenaire.org/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
	unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
	header('Location: index.php');
	exit();
?>