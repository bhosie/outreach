<?php
//
// /lib/eventcontroller.php
//
//This file is responsible for handling the form data from event/addevent.php
//
require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');


	//EVENT______________________________________________________________________________
	
	if(isset($_POST['event'])){
		
			$date = ($_POST['date']);
			
			//Verify all required fields are completed 					
			if (empty($_POST['date']) || empty($_POST['notes']) || ($_POST['inquiry'] == 'Select...')){

				$error = "Please enter all the * required information";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				exit();

			}
			

			//verify email matches valid criteria
			if (!preg_match ('/^[0-9]{4}-[0-1]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$/', $date)) {
			                  
				$FormValid="False";
				$error = "Wrong date format";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				exit();
		
			}
			
			
			//If above criteria checks out, insert new event into DB
			$newEvent = ("INSERT INTO details (
					user_id,
					contact_id,
					contact_date,
					contact_type,
					num_attend,
					in_out,
					notes)
					VALUES(
					'{$_SESSION['user_ID']}',
					'{$_POST['contact-id']}',
					'{$_POST['date']}',
					'{$_POST['inquiry']}',
					'{$_POST['attendance']}',
					'{$_POST['in_out']}',
					'{$_POST['notes']}');");

			$result = mysqli_query($connect, $newEvent);
			
			//Throw error if not successfully added
			if(!$result) {
				$error = "Query error: " . mysqli_error($connect);
				
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				exit();
			}


			//Set variables for displaying details about newly added event
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
				<td>{$_POST['in_out']}</td>
			  </tr>
			  <tr>
				<th scope='row' align='left'>Notes:</th>
				<td>{$_POST['notes']}</td>
			  </tr>
			</table>");
			
			

			require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
		
		
		
			
	}

?>
