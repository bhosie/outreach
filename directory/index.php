<?php
//
// /directory/index.php
//
//

//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
	
<!--Begin Page Content -->		
    <div id="content">
		<form action="../lib/directorycontroller.php" method="post" class="f-wrap-1">
		<label for="searchdirectory">Search the Directory:</label>
			<input id="searchdirectory" name="searchdirectory" type="text" />
			<input type="submit" name="search" value="Search" class="f-submit" />
			<br />
			
		</form>
        
<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>



