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
						if($_POST['firstname'] == !null){echo $_POST['firstname'] . " ";}
						if($_POST['lastname'] == !null){echo $_POST['lastname'] . "<br />";}
						if($_POST['email'] == !null){echo $_POST['email'] . "<br />";}
						if($_POST['phone'] == !null){echo $_POST['phone'] . "<br />";}
						if($_POST['title'] == !null){echo $_POST['title'] . "<br />";}
						if($_POST['school'] == !null){echo $_POST['school'] . "<br />";}
						if($_POST['address'] == !null){echo $_POST['address'] . "<br />";}
						if($_POST['city'] == !null){echo $_POST['city'] . " ";}
						if($_POST['state'] == !null){echo $_POST['state'] . " ";}
						if($_POST['zip'] == !null){echo $_POST['zip'] . "<br />";}

				}else{
					//Search Flag was not set!
					echo "You did not search for anyone.<br /><br />";
					exit();
				}
			?>
		</p>
			
			
<input name="contact-id" type="hidden" value="<?php echo $_POST['contact_id']; ?>"/>
<input name="user_id" type="hidden" value="<?php echo $_SESSION['user_ID']; ?>"/>
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
