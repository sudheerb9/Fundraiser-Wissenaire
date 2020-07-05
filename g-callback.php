<?php
	require_once "config.php";
    
	if (isset($_SESSION['access_token'])) {
		$gClient->setAccessToken($_SESSION['access_token']); 
		header('Location: home.php'); 
	}
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
		header('Location: home.php');
	} else {
		header('Location: index.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$Authuser = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $Authuser['id'];
	$_SESSION['email'] = $Authuser['email'];
    $servername = "localhost";
    $username = "wissenaire_sudheer";
    $password = "sudheer@wissenaire";
    $database = "wissenaire_fundraiser";
    $conn = new mysqli($servername, $username, $password,$database);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    
    $sql ="INSERT INTO users(email,providerid,gender,avatar,name) 
           VALUES('".$Authuser['email']."','".$Authuser['id']."','".$Authuser['gender']."', '".$Authuser['picture']."','".$Authuser['givenName']." ".$Authuser['familyName']."')";

    if(mysqli_query($conn,$sql)) header('Location: home.php');
	mysqli_close($conn);
?>