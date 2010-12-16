<?php
//
//event/index.php
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
			
			<h3>Add A New Event</h3>

			<?php
				//statement goes here to display selected Contact Person
				//for now, echo something:
				echo('John Doe <br /> Hunter High School<br />jdoe@school.org<br /> 801-555-1212');
			?>

<label for="date"><b><span class="req">*</span>Date</b>
			<input id="attendance" name="attendance" type="text" class="f-name" tabindex="" /><br />
			</label>
			
			<label for="inquiry"><b>Inquiry Type:</b>
			<select id="inquiry" name="inquiry" tabindex="4">
			<option>Select...</option>
			<option>phone call</option>
			<option>email</option>
			<option>booth event</option>
			<option>presentation</option>
			</select>
			<br />
			</label>

<label for="attendance"><b>How many attended?<br />(If applicable)</b>
			<input id="attendance" name="attendance" type="text" class="f-name" tabindex="1" /><br />
			</label>

			<!--<fieldset class="f-checkbox-wrap">   Commenting out checkboxes for now.
			
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
				
			</fieldset> -->
			
			<fieldset class="f-radio-wrap">
		
			<b>Incoming/<br />Outgoing<br />(If Applicable):</b>
			
				<fieldset>
				
				<label for="in">
				<input id="in" type="radio" name="radio" value="in" class="f-radio" tabindex="8" />
				In</label>
				
				<label for="out">
				<input id="out" type="radio" name="radio" value="out" class="f-radio" tabindex="9" />
				Out</label>
	
				</fieldset>
			
			</fieldset>
<label for="attendance"><b><span class="req">*</span>Notes:</b>
			<textarea id="notes" name="notes" type="text" cols="40" rows="5" class="f-name" tabindex="2" /><br />
			</label>
<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
