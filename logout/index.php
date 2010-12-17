<?php
//
//logout/index.php
//
//
	session_destroy(); //currently displaying error on the page if no session is present. How do we hide this?

//include html header file
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>

	
	<div id="content-wrap">
	
		<div id="content">

        <h1>You are now logged out.</h1> 
		
<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
