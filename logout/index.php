<?php
//
//logout/index.php
//
//
if (isset($_SESSION['username'])){
	session_destroy();
	$logout = 'You are now logged out'; 
}else{
	$logout = "Request not completed. You are not currently logged in.";
}
//include html header file
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
	
		<div id="content">

        <h1><?php echo $logout; ?></h1> 

        <br />
        <br />
        <br />
		
<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
