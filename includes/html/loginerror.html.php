<?php
//
// error.html.php
//

//Include header
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>

	<div id="content">

    <h1>Login Error</h1>

    <p><?php echo $error; ?></p>
		
			<br />
			<br />
			<br />

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
