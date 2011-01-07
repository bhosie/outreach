<?php
//
//home/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');



?>

	<div id="content">
    <h1>Change My Password</h1>

    <?php
		//Deny access if user is not logged in
		if (!isset($_SESSION['username'])){
    			echo "Request not completed. You are not currently logged in.<br /><br />";
			echo "<p><a href='/outreach/login/'>Return to the Login Page</a></p>";
		}else{
			//do stuff
		}
	?>
			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
