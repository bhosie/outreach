<?php
//
//
//This file Contains session_start() for all files requiring session data
//
session_start();

	
	if (!isset($_SESSION['username'])) {
		//header('Location: /outreach/login/');
	}


if(isset($_SESSION['user_ID'])){
	echo 'Username: ' .$_SESSION['username'] . '<br />';
	echo 'User ID: ' .$_SESSION['user_ID'] . '<br />';
	echo 'User Role: ' . $_SESSION['user_role'];
	}else{
		echo "No Session";
	}

//include html header file
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');


	
?>	
