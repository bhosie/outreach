<?php
//
//event/index.php
//
//
//Require the secure header file which contains session_start() if no session is present.
//This is just error checking. This file should only be reached as an include from newevent/index.php.
if(!isset($_SESSION)){

	require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');
	//include sidebar content
	include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');
}


?>
	
<!--Begin Page Content -->		
    <div id="content">
		
        <form action="../lib/eventcontroller.php" method="post" class="f-wrap-1">

			<div class="req"><b>*</b> Indicates required field</div>

			<fieldset>

			<h3>Add A New Event</h3>
	<p>
	<?php
				//Receive the values of the contact person that was selected in 
				//SearchController.php and display them for the user.
				if(isset($_POST['selectContact'])){
						if(!empty($_POST['firstname'])){echo html($_POST['firstname']) . " ";}
						if(!empty($_POST['lastname'])){echo html($_POST['lastname']) . "<br />";}
						if(!empty($_POST['email'])){echo html($_POST['email']) . "<br />";}
						if(!empty($_POST['phone'])){echo html($_POST['phone']) . "<br />";}
						if(!empty($_POST['title'])){echo html($_POST['title']) . "<br />";}
						if(!empty($_POST['school'])){echo html($_POST['school']) . "<br />";}
						if(!empty($_POST['address'])){echo html($_POST['address']) . "<br />";}
						if(!empty($_POST['city'])){echo html($_POST['city']) . " ";}
						if(!empty($_POST['state'])){echo html($_POST['state']) . " ";}
						if(!empty($_POST['zip'])){echo html($_POST['zip']) . "<br />";}

				}else{
					//Search Flag was not set!
					$error = "You did not search for anyone.";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
			?>
		</p>
			
			
<input name="contact-id" type="hidden" value="<?php echo $_POST['contact_id']; ?>"/>
<input name="user_id" type="hidden" value="<?php echo $_SESSION['user_ID']; ?>"/>
    <label for="date"><b><span class="req">*</span>Date</b>

<input name="date" type="text" class="f-name" id="date" tabindex="" maxlength="10" /><br /><p>YYYY-MM-DD</p>
		  </label>
			
			<label for="inquiry"><b><span class="req">*</span>Inquiry Type:</b>
			<select id="inquiry" name="inquiry" tabindex="4">
			<option>Select...</option>
			<option>phone call- UtahFutures</option>
			<option>phone call- other</option>
			<option>email- UtahFutures</option>
			<option>email- other</option>
			<option>booth event</option>
			<option>presentation- fin lit</option>
			<option>presentation- FAFSA night</option>
			<option>presentation- NT4CM</option>
			<option>presentation- Scholarships/Financial Aid</option>
			<option>presentation- UtahFutures (Students/Parents)</option>
			<option>presentation- UtahFutures (Educators)</option>
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
