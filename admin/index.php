<?php
//
//admin/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header2.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
		
		<div id="content">
		
			<form action="controller.php" method="post" class="f-wrap-1">
			
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
			
			<label for="enquiry"><b>User Role:</b>
			<select id="enquiry" name="role" tabindex="4">
			<option>Select...</option>
			<option>Call Center</option>
			<option>Team Leader</option>
			<option>Manager</option>
			</select>
			<br />
			</label>
			
			<fieldset class="f-radio-wrap">
		
			<b>Country:</b>
			
				<fieldset>
				
				<label for="australia">
				<input id="australia" type="radio" name="radio" value="Australia" class="f-radio" tabindex="8" />
				Australia</label>
				
				<label for="newzealand">
				<input id="newzealand" type="radio" name="radio" value="New Zealand" class="f-radio" tabindex="9" />
				New Zealand</label>
				
				<label for="antarctica">
				<input id="antarctica" type="radio" name="radio" value="Antarctica" class="f-radio" tabindex="10" />
				Antarctica</label>
	
				</fieldset>
			
			</fieldset>
            <hr/>
            <input type="submit" name="user" value="Create User" class="f-submit" tabindex="11" />
            </form>

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
