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
	<?php 
		if(isset($_SESSION['username'])){
			echo "<p>Welcome, {$_SESSION['firstname']}</p>";
			//include homecontent file
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/homecontent.html.php');		
		}else if(!isset($_SESSION['username'])){
			echo "<p>You do not have sufficient privileges to view this page. Please <a href='/outreach/login/'>log in.</a></p>";
		}
	?>
    

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
