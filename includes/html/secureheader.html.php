<?php
//
//
//This file Contains session_start() for all files requiring session data
//
session_start();

	
	if (!isset($_SESSION['user_ID'])) {
		header('Location: /outreach/login/');
	}

//include html header file
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');


	
?>	
