<?php
//
//lib/contactcontroller.php
//
//This file is responsible for handling form data received from newcontact/index.php and adding a new contact person to the DB.

require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

	
	//CONTACT_____________________________________________________________________________________
	
	if(isset($_POST['contact'])){
		
		if (empty($_POST['firstname']) ||  empty($_POST['lastname']) ||
			empty($_POST['phone']) ||  empty($_POST['jobtitle']) ||
			empty($_POST['schoolname'])  ||  !is_numeric($_POST['phone'])){
				$error = "Please enter all the * required information";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
	
	}else{
			//Ping DB to see if Contact already exists
			$checkcontact = "SELECT lastname, firstname FROM contacts
									WHERE lastname = '{$_POST['lastname']}'
									AND firstname = '{$_POST['firstname']}';";
			
			$check = mysqli_query($connect, $checkcontact);
				
				
			$rowcount = mysqli_num_rows($check);
	
			if($rowcount >= 1){
				$error = ("Could not add contact! This contact person already exists:
							'{$_POST['lastname']}' '{$_POST['firstname']}'" );
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
					
			}

			//Check for valid phone number format
			$phone = ($_POST['phone']);
			if( !preg_match("/^[0-9]{10}$/", $phone) ) { 
			
					
					$error = "Invalid phone number";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					return false;
					}

			

			//Check for valid email format
			$email = ($_POST['emailaddress']);
			
			if( !preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email) ) { 
			
					
					$error = "Invalid email";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					return false;
			
				}else {
					//Prepare to grab school data and insert new contact into DB
					
					if($_POST['schoolname'] == "none"){
						//selected "None" - new contact is not associated with a school
						//skip school lookup and continue with script
						continue;
					}else{
						//FIXME: DO I NEED TO STORE THE DISTRICT CODE IN THE CONTACTS TABLE. FIND A WAY NOT TO
						//Get the school data for the school selected  by the user
						$schoollookup = "SELECT dist_code, school_code FROM school
										WHERE school_name = '{$_POST['schoolname']}'";

						$result = mysqli_query($connect, $schoollookup);

						$rowcount = mysqli_num_rows($result);

						//Get school data from $checkschool
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
		
						$newContact = ("INSERT INTO contacts(
										firstname,
										lastname,
										phone,
										email,
										title,
										school_code,
										dist_code,
										lead)
										VALUES(
										'{$_POST['firstname']}',
										'{$_POST['lastname']}',
										'{$_POST['phone']}',
										'{$_POST['emailaddress']}',
										'{$_POST['jobtitle']}',
										'$schoolCode',
										'$distCode',
										'{$_POST['lead']}');");

						$result = mysqli_query($connect, $newContact);
				


				
						if(!$result) {
							$error = "Query error: " . mysqli_error($connect);
							echo $error;
							include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
							exit();
						}else{

							//If addition was successful, display the results
							$success = 
							("<table width='200' border='0' cellspacing='0' cellpadding='0' align='left'>
			  <t	r>
				<th scope='row' align='left'>First Name:</th>
				<td>{$_POST['firstname']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Last Name:</th>
				<td>{$_POST['lastname']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Phone:</th>
				<td>{$_POST['phone']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Email:</th>
				<td>{$_POST['emailaddress']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Title:</th>
				<td>{$_POST['jobtitle']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>School:</th>
				<td>{$_POST['schoolname']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Lead Counselor:</th>
				<td>{$_POST['lead']}</td>
			  </tr>
			</table");
				
				require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
				}
			}
			}
		}
	}

?>
