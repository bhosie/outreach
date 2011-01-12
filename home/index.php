<?php
//
//home/index.php
//
//
require($_SERVER['DOCUMENT_ROOT'] .'/outreach/lib/db.inc.php');
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>

	
	<?php 
		if(isset($_SESSION['username'])){
			$username = $_SESSION['firstname'];
			$welcomeMessage = "Welcome, " . html($username);
			//include homecontent file
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/homecontent.html.php');		
		}else if(!isset($_SESSION['username'])){
			$error = "You do not have sufficient privileges to view this page. Please <a href='/outreach/login/'>log in.</a>";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();
		}
	?>
    

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
