<?php
//
//newcontact/index.php
//
//

require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/sqlstatements.php');

//Require the header2 file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

?>
		
<!-- Begin Page Content -->
	<div id="content">

	<form action="../lib/contactcontroller.php" method="post" class="f-wrap-1">
		
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

		<label for="schoolname"><b><span class="req">*</span>School</b>
		    <select id="schoolname" name="schoolname" tabindex="4">
				<option>Select...</option>
				<option>none</option>
				
				<?php
					//list school names from DB

					$result = mysqli_query($connect, $getSchoolNames);

				if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
		
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
		
				$rowcount = mysqli_num_rows($result);
				while ($row = mysqli_fetch_assoc($result)) {
				//set each school name retrieved from DB as a selectable option in dropdown
				echo "<option>" . $row['school_name'] . "</option>";
				}	
	
				?>
			</select><br />
		</label>

		<!--<label for="altschoolcode"><b>Alt School Code:</b>
		    <input id="altschoolcode" name="altschoolcode" type="text" class="f-email" tabindex="3" /><br />
		</label>-->
			
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
