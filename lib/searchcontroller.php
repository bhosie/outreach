<?php
//
//
//Temp file while nate works on controller.php
require('sqlstatements.php');
require('db.inc.php');

// CONTACT PERSON SEARCH______________________________________________________________________
	
	if(isset($_POST['searchcontact'])){
		
		if(empty($_POST['searchcontact'])){
			$error = "Please enter a Contact Person's Last Name.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
			}else{
				/*$contactsearch = "SELECT firstname, lastname, FROM contacts
								WHERE lastname = '{$_POST['searchcontact']}';";*/

				$result = mysqli_query($connect, $getcontact);

				if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
		
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
		
				$rowcount = mysqli_num_rows($result);
				while ($row = mysqli_fetch_assoc($result)) {
				//Set result variables
				$contact_id = $row['contact_id'];
     			$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$email = $row['email'];
				$phone = $row['phone'];
				$title = $row['title'];
				$school = $row['school_name'];
				$address = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zip'];
				}	
	
				if($rowcount == 1){
					//Set a flag for addevent.php that notifies the page the a search was submitted.
					$searched = TRUE;
					
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/event/addevent.php');

				}else if($rowcount > 1){
					$error = "Multiple Contacts Found! Please Contact the Administrator.";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				}
					
				else {
					$error = "No Contacts Found";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
				}
			}
}



?>

