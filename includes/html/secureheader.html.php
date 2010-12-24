<?php
//
//
//This file does a session check for all files other than /login/index.php
//

//Require Sessions File
require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/sessions.php'); //FIXME
	
	if (!isset($_SESSION['username'])) {
		header('Location: /outreach/login/');
	}


if(isset($_SESSION['user_ID'])){
	echo $_SESSION['user_ID'];
	}else{
		echo "No Session";
	}

//include html header file
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');


	
?>	
