<?php
//
//password/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');



?>

	<div id="content">
    

    <?php
		//Deny access if user is not logged in
		if (!isset($_SESSION['username'])){
    			echo "Request not completed. You are not currently logged in.<br /><br />";
			echo "<p><a href='/outreach/login/'>Return to the Login Page</a></p>";
			exit();
		}
	?>
	
	<form action="../lib/changepassword.php" method="post" class="f-wrap-1">
			
		<div class="req"><b>*</b> Indicates required field</div>
			
			<h3>Change My Password:</h3>
			
			<label for="oldpassword"><b><span class="req">*</span>Old Password:</b>
			<input id="oldpassword" name="oldpassword" type="password" class="f-name" tabindex="1" /><br />
			</label>
			
			<label for="newpassword"><b><span class="req">*</span>New Password:</b>
			<input id="newpassword" name="newpassword" type="password" class="f-name" tabindex="2" /><br />
			</label>

			<label for="confirmnewpassword"><b><span class="req">*</span>Confirm:</b>
			<input id="confirmnewpassword" name="confirmnewpassword" type="password" class="f-name" tabindex="3" /><br />
			</label>

            <input type="submit" name="change" value="Change" class="f-submit" tabindex="4"/>
            </form>




<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
