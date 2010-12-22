<?php
//
// error.html.php
//

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>

	<div id="content">

    <h1>Error</h1>

    <p><strong><?php echo $indatabase; echo $result; ?> </strong></p>
		
<br />
			<br />
			<br />

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
