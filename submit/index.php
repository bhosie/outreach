<?php
//
//submit/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header2.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
	
<!--Begin Page Content -->		
		<div id="content">
		
			<form action="forms.html" method="post" class="f-wrap-1">
			
			<div class="req"><b>*</b> Indicates required field</div>
			
			<fieldset>
			
			<h3>Outreach Database</h3>
			
			<label for="firstname"><b><span class="req">*</span>First name:</b>
			<input id="firstname" name="firstname" type="text" class="f-name" tabindex="1" /><br />
			</label>
			
			<label for="lastname"><b><span class="req">*</span>Last name:</b>
			<input id="lastname" name="lastname" type="text" class="f-name" tabindex="2" /><br />
			</label>
			
			<label for="emailaddress"><b><span class="req">*</span>Email Address:</b>
			<input id="emailaddress" name="emailaddress" type="text" class="f-email" tabindex="3" /><br />
			</label>
			
			<label for="enquiry"><b>Enquiry Type:</b>
			<select id="enquiry" name="enquiry" tabindex="4">
			<option>Select...</option>
			<option>c nulla. Fusce tincidu</option>
			<option>Maecenas digniss</option>
			<option>tincidunt arcu eget sapien</option>
			</select>
			<br />
			</label>
			
			<fieldset class="f-checkbox-wrap">
			
			<b>Colour:</b>
			
				<fieldset>
				
				<label for="blue">
				<input id="blue" type="checkbox" name="checkbox" value="checkbox" class="f-checkbox" tabindex="5" />
				sit amet, consectetu</label>
				
				<label for="green">
				<input id="green" type="checkbox" name="checkbox2" value="checkbox" class="f-checkbox" tabindex="6" />
				c nulla. Fusce tincidu</label>
				
				<label for="yellow">
				<input id="yellow" type="checkbox" name="checkbox3" value="checkbox" class="f-checkbox" tabindex="7" />
				tincidunt arcu eget </label>
				</fieldset>
				
			</fieldset> 
			
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

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
