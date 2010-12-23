<?php
//
//newcontact/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
		
<!-- Begin Page Content -->
	<div id="content">

	<form action="../lib/controller.php" method="post" class="f-wrap-1">
		
    	<div class="req"><b>*</b> Indicates required field</div>
		
    	<fieldset>
			
		<h3>Add A New Contact</h3>
		
		<label for="firstname"><b><span class="req">*</span>First name:</b>
		    <input id="firstname" name="firstname" type="text" class="f-name" tabindex="1" /><br />
		</label>
		
		<label for="lastname"><b><span class="req">*</span>Last name:</b>
		    <input id="lastname" name="lastname" type="text" class="f-name" tabindex="2" /><br />
		</label>

		<label for="phone"><b><span class="req">*</span>Phone Number:</b>
		    <input name="phone" type="text" class="f-email" id="phone" tabindex="3" maxlength="10" /><br />
		</label>
		
		<label for="emailaddress"><b><span class="req">*</span>Email Address:</b>
		    <input id="emailaddress" name="emailaddress" type="text" class="f-email" tabindex="3" /><br />
		</label>
		
		<label for="jobtitle"><b><span class="req">*</span>Job Title:</b>
		    <input id="jobtitle" name="jobtitle" type="text" class="f-email" tabindex="3" /><br />
		</label>

		<label for="schoolcode"><b><span class="req">*</span>School Code<br />(3 Digit):</b>
		    <input name="schoolcode" type="text" class="f-email" id="schoolcode" tabindex="3" maxlength="3" /><br />
		</label>

		<label for="altschoolcode"><b>Alt School Code:</b>
		    <input id="altschoolcode" name="altschoolcode" type="text" class="f-email" tabindex="3" /><br />
		</label>
			
	<fieldset class="f-radio-wrap">
		
		<b>Lead Counselor?</b>
			
		<fieldset>
			<label for="lead">
			<input id="lead" type="radio" name="lead" value="yes" class="f-radio" tabindex="8" />
			Yes</label>
			
			<label for="no">
			<input id="lead" type="radio" name="lead" value="no" class="f-radio" tabindex="9" />
			No</label>
		</fieldset>
		
	</fieldset>
    <hr/>

    <input type="submit" name="contact" value="Add Contact" class="f-submit" tabindex="10" />
    </form>

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
