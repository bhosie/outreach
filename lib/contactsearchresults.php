<?php
//
//This file is a handler responible for passing contact search results from searchcontroller.php
//to /event/index.php
//
//
	$results = TRUE;
	if(!isset($_POST['contactsearch'])){
	//echo 'I guess you think you\'re pretty tricky, huh?';
	exit();
	}
	require('searchcontroller.php');
?>
