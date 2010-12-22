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
			
			 	
			echo "Date: {$_POST['date']}<br />";
			echo "Inquiry: {$_POST['inquiry']}<br />";
			echo "Attended: {$_POST['attendance']}<br /><br />";
			echo "Contact Type: {$_POST['radio']}<br /><br />";
			echo "Notes: {$_POST['notes']}<br /><br />";
			
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
				 
				
				echo 'You added the following user. YAY!';
				echo "First Name: {$_POST['firstname']}<br />";
				echo "Last Name: {$_POST['lastname']}<br />";
				echo "Email: {$_POST['emailaddress']}<br />";
				echo "User Role: {$_POST['role']}<br />";
				echo "UserName: {$_POST['username']}<br />";
				echo "Pass: {$_POST['password']}<br />";
				
				require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');	

				if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
					echo $error;
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
				echo "Please enter all the * required information";
		
			}else{

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
				("FirstName: {$_POST['firstname']}<br />
				LastName: {$_POST['lastname']}<br />
				Phone: {$_POST['phone']}<br />
				Email: {$_POST['emailaddress']}<br />
				Title: {$_POST['jobtitle']}<br />
				School: {$_POST['schoolcode']}<br />
				Alt School: {$_POST['altschoolcode']}<br />
				Lead: {$_POST['lead']}<br />");
				
				require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
				
			if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
					echo $error;
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
			}
		}


	
	//SEARCH______________________________________________________________________
	
	else if(isset($_POST['search'])){

		echo "SEARCH TERM: {$_POST['search']}<br />";

	}


?>
