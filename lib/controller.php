<?php

//require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/sqlstatements.php');
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');	

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
					contact_date,
					contact_type,
					num_attend,
					in_out,
					notes)
					VALUES(
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
	
	//USER________________________________________________________________________________
	
	else if(isset($_POST['user'])){
		
		if (empty($_POST['firstname']) ||  empty($_POST['lastname']) ||
			empty($_POST['emailaddress']) ||  empty($_POST['role']) ||
			empty($_POST['username']) ||  empty($_POST['password'])){
					$error = "Please enter all the * required information";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		}else{
				$checkcontact = "SELECT username, lastname FROM users
									WHERE username = '	`{$_POST['username']}'
									AND lastname = '{$_POST['lastname']}';";
			
				$check = mysqli_query($connect, $checkcontact);
				
				
				$rowcount = mysqli_num_rows($check);
	
			if($rowcount == 1){
				$error = ("Could not add user! The username '{$_POST['username']}' is taken. Please enter a different username and try again.");
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
					
			}
			$email = ($_POST['emailaddress']);
			
   
      
			
				if(!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*
								(.[a-z]{2,3})$/i", $email)){
					
					$error = "Invalid email";
					
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					return false;
					}
				else {
				$newUser = ("INSERT INTO users(
					firstname,
					lastname,
					email,
					user_role,
					username,
					password)
					VALUES(
					'{$_POST['firstname']}',
					'{$_POST['lastname']}',
					'{$_POST['emailaddress']}',
					'{$_POST['role']}',
					'{$_POST['username']}',
					md5('{$_POST['password']}'));");
	
				$result = mysqli_query($connect, $newUser);
				 
				$success =
				("You created a new user with the following information: <br />
				<table width='200' border='0' cellspacing='0' cellpadding='0' align='left'>
			  <tr>
				<th scope='row' align='left'>First Name:</th>
				<td>{$_POST['firstname']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Last Name:</th>
				<td>{$_POST['lastname']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Email:</th>
				<td>{$_POST['emailaddress']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>User Role:</th>
				<td>{$_POST['role']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>UserName:</th>
				<td>{$_POST['username']}</td>
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

// CONTACT PERSON SEARCH______________________________________________________________________
	
	else if(isset($_POST['searchcontact'])){
		
		if(empty($_POST['searchcontact'])){
			$error = "Please enter a Contact Person's Last Name.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
			}else{
				$contactsearch = "SELECT lastname, firstname FROM contacts
								WHERE lastname = '{$_POST['searchcontact']}';";

				$result = mysqli_query($connect, $contactsearch);

				if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
		
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
		
				$rowcount = mysqli_num_rows($result);
	
				if($rowcount == 1){
					echo $contactsearch;
				}else {
					$error = "No Contacts Found";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
				}
			}
	}



?>
