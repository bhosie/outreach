<?php
//
//lib/updatecontact.php
//
//This file is responsible for handling form data received from newcontact/index.php and adding a new contact person to the DB.

require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

	
	//CONTACT_____________________________________________________________________________________
	
if(isset($_POST['contact'])){
		//Check that all required fields are set
	if (empty($_POST['firstname']) ||  empty($_POST['lastname']) ||
		empty($_POST['phone']) ||  empty($_POST['jobtitle']) || !is_numeric($_POST['phone']) || ($_POST['schoolname'] == 'Select...')){
				$error = "Please enter all the * required information";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				exit();
	}

	//Check for valid phone number format
	$phone = ($_POST['phone']);
	if( !preg_match("/^[0-9]{10}$/", $phone) ) { 
			
					
			$error = "Invalid phone number";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();
	}

	//Check for valid email format
	$email = ($_POST['emailaddress']);
			
	if( !preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email) ) { 
								
		$error = "Invalid email";
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		exit();
			
	}
		
	//Prepare to grab school data and insert new contact into DB
	if($_POST['schoolname'] == "none"){
			//selected "None" - new contact is not associated with a school
			//skip school lookup and continue with script
			$schoolCode = NULL;
			$distCode = NULL;
	}else{
						
		//Get the school data for the school selected  by the user
		$schoollookup = "SELECT dist_code, school_code FROM school
						WHERE school_name = '{$_POST['schoolname']}'";

		$result = mysqli_query($connect, $schoollookup);

		$rowcount = mysqli_num_rows($result);

		//Get school data from $checkschool and create variables to input info into DB
		$rowcount = mysqli_num_rows($result);
		while ($row = mysqli_fetch_assoc($result)) {			

			$schoolCode = $row['school_code'];
			$distCode = $row['dist_code'];
		}
	
		if($rowcount < 1){
			$error = "Invalid school";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();

		}
	}
						
		$updateContact = ("UPDATE contacts
							SET firstname = '{$_POST['firstname']}',
							lastname = '{$_POST['lastname']}',
							phone = '{$_POST['phone']}',
							email = '{$_POST['emailaddress']}',
							title = '{$_POST['jobtitle']}',
							school_code = '$schoolCode',
							dist_code = '$distCode',
							lead = '{$_POST['lead']}'
							WHERE contact_id = '{$_POST['contact_id']}';");

		$result = mysqli_query($connect, $updateContact);
				
//Notice: Undefined index: contact_id in /opt/local/apache2/htdocs/outreach/lib/updatecontact.php on line 90


				
		if(!$result) {
			$error = "Query error: " . mysqli_error($connect);
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();

		}else{

			//If addition was successful, display the results
			$success = 
			("<table width='200' border='0' cellspacing='0' cellpadding='0' align='left'>
			  <t	r>
				<th scope='row' align='left'>First Name:</th>
				<td>". html($_POST['firstname']) ."</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Last Name:</th>
				<td>". html($_POST['lastname']) ."</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Phone:</th>
				<td>". html($_POST['phone']) ."</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Email:</th>
				<td>". html($_POST['emailaddress']) ."</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Title:</th>
				<td>". html($_POST['jobtitle']) ."</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>School:</th>
				<td>". html($_POST['schoolname']) ."</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Lead Counselor:</th>
				<td>". html($_POST['lead']) ."</td>
			  </tr>
			</table");
				
				require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
		}
	
}

?>
