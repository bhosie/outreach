<?php
//
// error.html.php
//

//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');


?>

	<div id="content">

    <h1>Success</h1>
	<h3>Information Successfully Added</h3>
    <p><?php echo $success ?></p>
		
			<br />
			<br />
			<br />

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
