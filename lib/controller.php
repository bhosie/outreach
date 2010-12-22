<?php

//require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/sqlstatements.php');
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
	

	//EVENT______________________________________________________________________________
	
	if(isset($_POST['event'])){

if (empty($_POST['date']) ||  empty($_POST['notes'])){
		echo "Please enter all the * required information";
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
				echo $error;
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
					echo "Please enter all the * required information";
		}else{
			$checkcontact = "SELECT * FROM users
									WHERE lastname = '{$_POST['lastname']}'
									AND firstname = '{$_POST['firstname']}';";
			
				$check = mysqli_query($connect, $checkcontact);
				
				
				$rowcount = mysqli_num_rows($check);
	
			if($rowcount == 1){
				$indatabase = ("This person is already in the data base!");
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
					
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
			  </tr><tr>
				<th scope='row' align='left'>Password:</th>
				<td>{$_POST['password']}</td>
			  </tr>
			</table>");
				
				require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');	
			
				if(!$result) {
					$result = "Query error: " . mysqli_error($connect);
					echo $error;
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
				echo "Please enter all the * required information";
	
	}else{
			$checkcontact = "SELECT * FROM contacts
									WHERE lastname = '{$_POST['lastname']}'
									AND firstname = '{$_POST['firstname']}';";
			
				$check = mysqli_query($connect, $checkcontact);
				
				
				$rowcount = mysqli_num_rows($check);
	
			if($rowcount == 1){
				$indatabase = ("This person is already in the data base!");
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
					
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

		echo "SEARCH TERM: {$_POST['searchsite']}<br />";

	}


?>
