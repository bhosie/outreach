<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');


	//EVENT______________________________________________________________________________
	
	if(isset($_POST['event'])){
		
			$date = ($_POST['date']);
			 					
			if (empty($_POST['date']) ||  empty($_POST['notes'])){
			$error = "Please enter all the * required information";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		}
		else if (!preg_match ('/^[0-9]{4}-[0-1]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$/', $date)) {
			                  
				$FormValid="False";
				$error = "Wrong date format";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			
		
		}else{
			
			
			
			$newEvent = ("INSERT INTO details (
					contact_id,
					contact_date,
					contact_type,
					num_attend,
					in_out,
					notes)
					VALUES(
					'{$_POST['contact-id']}',
					'{$_POST['date']}',
					'{$_POST['inquiry']}',
					'{$_POST['attendance']}',
					'{$_POST['radio']}',
					'{$_POST['notes']}');");

			$result = mysqli_query($connect, $newEvent);
			
			$success = 	
			(" <table width='200' border='0' cellspacing='0' cellpadding='0' align='left'>
			  <tr>
				<th scope='row' align='left'>Date:</th>
				<td>{$_POST['date']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Inquiry:</th>
				<td>{$_POST['inquiry']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Attended:</th>
				<td>{$_POST['attendance']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Contact Type:</th>
				<td>{$_POST['radio']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Notes:</th>
				<td>{$_POST['notes']}</td>
			  </tr>
			</table>");
			
			
			

			require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
			
		if(!$result) {
				$error = "Query error: " . mysqli_error($connect);
				
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				exit();
			}
		}	
	}

	//CONTACT_____________________________________________________________________________________
	
	else if(isset($_POST['contact'])){
		
		if (empty($_POST['firstname']) ||  empty($_POST['lastname']) ||
			empty($_POST['phone']) ||  empty($_POST['jobtitle']) ||
			empty($_POST['schoolcode'])  ||  !is_numeric($_POST['phone'])){
				$error = "Please enter all the * required information";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
	
	}else{
			//Ping DB to see if Contact already exists
			$checkcontact = "SELECT lastname, firstname FROM contacts
									WHERE lastname = '{$_POST['lastname']}'
									AND firstname = '{$_POST['firstname']}';";
			
			$check = mysqli_query($connect, $checkcontact);
				
				
			$rowcount = mysqli_num_rows($check);
	
			if($rowcount == 1){
				$error = ("Could not add contact! This contact person already exists:
							'{$_POST['lastname']}' '{$_POST['firstname']}'" );
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
					
			}
			$phone = ($_POST['phone']);
			if( !preg_match("/^[0-9]{10}$/", $phone) ) { 
			
					
					$error = "Invalid phone number";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					return false;
					}
			$email = ($_POST['emailaddress']);
			
			if( !preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email) ) { 
			
					
					$error = "Invalid email";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					return false;
					}
				else {
					
				$newContact = ("INSERT INTO contacts(
						firstname,
						lastname,
						phone,
						email,
						title,
						school_code,
						alt_school_code,
						lead)
						VALUES(
						'{$_POST['firstname']}',
						'{$_POST['lastname']}',
						'{$_POST['phone']}',
						'{$_POST['emailaddress']}',
						'{$_POST['jobtitle']}',
						'{$_POST['schoolcode']}',
						'{$_POST['altschoolcode']}',
						'{$_POST['lead']}');");

				$result = mysqli_query($connect, $newContact);
				
				$success = 
				("<table width='200' border='0' cellspacing='0' cellpadding='0' align='left'>
			  <tr>
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
				<td>{$_POST['schoolcode']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Alt School:</th>
				<td>{$_POST['altschoolcode']}</td>
			  </tr><tr>
				<th scope='row' align='left'>Lead Counselor:</th>
				<td>{$_POST['lead']}</td>
			  </tr>
			</table");
				
				require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
				
				
			if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
					echo $error;
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
			}
		}
	}

	
	//SEARCH______________________________________________________________________
	
	else if(isset($_POST['searchsite'])){

		if(empty($_POST['searchsite'])){
			$error = "Please enter a search term.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
			}else{
			echo "<br />SEARCH TERM: {$_POST['searchsite']}<br />";
			
			}
	}




?>
