<?php
//
// /lib/searchcontroller.php
//
//This file is responsible for handling the form data from event/index.php where a user searches for a contact
//
require('sqlstatements.php');
require('db.inc.php');

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

// CONTACT PERSON SEARCH______________________________________________________________________
	
	if(isset($_POST['searchcontact'])){
		
		if(empty($_POST['searchcontact'])){
			$error = "Please enter a Contact Person's Last Name.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
			}else{

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
					//Set a flag for addevent.php that notifies the page that a search was submitted.
					$searched = TRUE;
					
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/event/addevent.php');

				}else if($rowcount > 1){
					echo "<div id = 'Content'>";
					$availableEntries = $rowcount;


					//FIXME: Attempt to convert this loop to a function later.
					//function multipleEntries($availableEntries){
						$i = 1;
		
						while($i <= $availableEntries){
							echo "<p>";
							if($firstname == !null){echo $firstname . " ";}
							if($lastname == !null){echo $lastname . "<br />";}
							if($email == !null){echo $email . "<br />";}
							if($phone == !null){echo $phone . "<br />";}
							if($title == !null){echo $title . "<br />";}
							if($school == !null){echo $school . "<br />";}
							if($address == !null){echo $address . "<br />";}
							if($city == !null){echo $city . " ";}
							if($state == !null){echo $state . " ";}
							if($zip == !null){echo $zip . "<br />";}
							echo "<a href=". "#" .">Select This Contact</a>";
							echo "</p>";
						$i++;//}
					
					//multipleEntries($rowcount);
						if(/*contact was selected*/){
							//set searched flag
							$searched = TRUE;
							include($_SERVER['DOCUMENT_ROOT'] . '/outreach/event/addevent.php');
					
					}
					echo "</div>";

				}else {
					$error = "No Contacts Found";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
				}
			}
}



?>

