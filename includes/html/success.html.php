<?php
//
// error.html.php
//

//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . 'header2.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . 'sidebar.html.php');

?>

	<div id="content">

    <h1>Success</h1>

    <p><?php echo $output ?></p>
		
			<br />
			<br />
			<br />

			<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . 'footer.html.php');

?>
