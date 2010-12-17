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

        <form action="controller.php" method="post" class="f-wrap-1">

			<div class="req"><b>*</b> Indicates required field</div>

			<fieldset>

			<h3>Add A New Event</h3>

			<?php
				//statement goes here to display selected Contact Person
				//for now, echo something:
				echo('John Doe <br /> Hunter High School<br />jdoe@school.org<br /> 801-555-1212');
			?>

    <label for="date"><b><span class="req">*</span>Date</b>
			<input id="date" name="date" type="text" class="f-name" tabindex="" /><br />
			</label>
			
			<label for="inquiry"><b>Inquiry Type:</b>
			<select id="inquiry" name="inquiry" tabindex="4">
			<option>Select...</option>
			<option>phone</option>
			<option>email</option>
			<option>booth event</option>
			<option>presentation</option>
			</select>
			<br />
	</label>

    <label for="attendance"><b>How many attended?<br />(If applicable)</b>
		<input id="attendance" name="attendance" type="text" class="f-name" tabindex="1" /><br />
	</label>			

	<fieldset class="f-radio-wrap">

		<b>Contact Type</b>

			<fieldset>
			    <label for="in">
			    <input id="contact-type" type="radio" name="radio" value="incoming" class="f-radio" tabindex="8" />
			    Incoming</label>

			    <label for="out">
			    <input id="contact-type" type="radio" name="radio" value="outgoing" class="f-radio" tabindex="9" />
			    Outgoing</label>
			</fieldset>

	</fieldset>

    <label for="notes"><b><span class="req">*</span>Notes:</b>
			<textarea id="notes" name="notes" type="text" cols="40" rows="5" class="f-name" tabindex="2" /></textarea><br />
	</label>

    <input type="Submit" name="submit" value="Add Event" class="f-submit" tabindex="10" />
    </form>

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
