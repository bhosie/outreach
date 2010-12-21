<?php
//
//logout/index.php
//
//
if (isset($_SESSION['username'])){
	session_destroy(); //currently displaying error on the page if no session is present. How do we hide this?
}
//include html header file
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
	
		<div id="content">

        <h1>You are now logged out.</h1> 

        <br />
        <br />
        <br />
		
<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
