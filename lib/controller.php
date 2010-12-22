<?php

require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/sqlstatements.php');
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
	

	//EVENT______________________________________________________________________________
	
	if(isset($_POST['event'])){

if (empty($_POST['date']) ||  empty($_POST['notes'])){
		echo "Please enter all the * required information";
		}else{
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
					$result = mysqli_query($connect, $newContact);
			
				echo "FirstName: {$_POST['firstname']}<br />";
				echo "LastName: {$_POST['lastname']}<br />";
				echo "Phone: {$_POST['phone']}<br />";
				echo "Email: {$_POST['emailaddress']}<br />";
				echo "Title: {$_POST['jobtitle']}<br />";
				echo "School: {$_POST['schoolcode']}<br />";
				echo "Alt School: {$_POST['altschoolcode']}<br />";
				echo "Lead: {$_POST['lead']}<br />";
				
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
