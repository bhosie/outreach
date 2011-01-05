<?php
//
//event/index.php
//
//
//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
	
<!--Begin Page Content -->		
    <div id="content">
		
        <form action="../lib/eventcontroller.php" method="post" class="f-wrap-1">

			<div class="req"><b>*</b> Indicates required field</div>

			<fieldset>

			<h3>Add A New Event</h3>
	<?php
				//Receive a search flag from SearchController.php
				if(isset($searched)){
						if($firstname == !null){echo $firstname . "<br />";}
						if($lastname == !null){echo $lastname . "<br />";}
						if($email == !null){echo $email . "<br />";}
						if($phone == !null){echo $phone . "<br />";}
						if($title == !null){echo $title . "<br />";}
						if($school == !null){echo $school . "<br />";}
						if($address == !null){echo $address . "<br />";}
						if($city == !null){echo $city . "<br />";}
						if($state == !null){echo $state . "<br />";}
						if($zip == !null){echo $zip . "<br />";}
						//echo "contact ID: " . $contact_id;

				}else{
					//Search Flag was not set!
					echo "You did not search for anyone.<br /><br />";
					exit();
				}
			?>
			
			
<?php print $contact_id; ?>
<input name="contact-id" type="hidden" value="<?php print $contact_id; ?>"/>
    <label for="date"><b><span class="req">*</span>Date</b>

<input name="date" type="text" class="f-name" id="date" tabindex="" maxlength="10" /><br /><p>YYYY-MM-DD</p>
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

		<b><span class="req">*</span>Contact Type</b>

			<fieldset>
			    <label for="in">
			    <input id="contact-type" type="radio" name="in_out" value="incoming" class="f-radio" tabindex="8" />
			    Incoming</label>

			    <label for="out">
			    <input id="contact-type" type="radio" name="in_out" value="outgoing" class="f-radio" tabindex="9" />
			    Outgoing</label>
			</fieldset>

	</fieldset>

    <label for="notes"><b><span class="req">*</span>Notes:</b>
			<textarea id="notes" name="notes" type="text" cols="40" rows="5" class="f-name" tabindex="2" /></textarea><br />
	</label>

    <hr/>
    <input type="submit" name="event" value="Add Event" class="f-submit" tabindex="10" />
    </form>

<?php

//Include Footer
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/footer.html.php');

?>
