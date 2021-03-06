<?php
//
//admin/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');


	


?>
		
	<div id="content">
			<?php 
				//Verify user is an admin, otherwise throw error
				if($_SESSION['user_role'] != 'A'){
					$error =  "Access denied. You do not have sufficient privileges to view this page.";

					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}	
			?>

		<form action="../lib/admincontroller.php" method="post" class="f-wrap-1">
		
		<div class="req"><b>*</b> Indicates required field</div>
			
	<fieldset>
			
		<h3>User Management</h3>
			
		<label for="firstname"><b><span class="req">*</span>First name:</b>
		<input id="firstname" name="firstname" type="text" class="f-name" tabindex="1" /><br />
		</label>
			
		<label for="lastname"><b><span class="req">*</span>Last name:</b>
		<input id="lastname" name="lastname" type="text" class="f-name" tabindex="2" /><br />
		</label>
			
		<label for="emailaddress"><b><span class="req">*</span>Email Address:</b>
		<input id="emailaddress" name="emailaddress" type="text" class="f-email" tabindex="3" /><br />
		</label>
			
		<label for="inquiry"><b><span class="req">*</span>User Role:</b>
		<select id="inquiry" name="role" tabindex="4">
		<option>Select...</option>
		<option>User</option>
		<option>Manager</option>
		<option>Admin</option>
		</select>
		<br />
		</label>

		<label for="username"><b><span class="req">*</span>Username:</b>
		<input id="username" name="username" type="text" class="f-name" tabindex="5" /><br />
		</label>
			
		<label for="password"><b><span class="req">*</span>Password</b>
		<input id="password" name="password" type="password" class="f-name" tabindex="6" /><br />
		</label>
			
	</fieldset>
        
    <hr/>
    <input type="submit" name="user" value="Create User" class="f-submit" tabindex="7" />
    </form>

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
