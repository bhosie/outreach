<?php
//
//login/index.php
//
//
//Include standard header w/o session check
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');
//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>

	<div id="content">
		
		<form action="../lib/controller.php" method="post" class="f-wrap-1">
			
		<div class="req"><b>*</b> Indicates required field</div>
			
			<h3>Outreach Database</h3>
			
			<label for="username"><b><span class="req">*</span>Username:</b>
			<input id="username" name="username" type="text" class="f-name" tabindex="1" /><br />
			</label>
			
			<label for="password"><b><span class="req">*</span>Password:</b>
			<input id="password" name="password" type="text" class="f-name" tabindex="2" /><br />
			</label>

            <input type="submit" name="login" value="Login" class="f-submit" tabindex="3"/>
            </form>

            <br />

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
