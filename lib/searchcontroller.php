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
		
		//Check whether a search form was submitted
		if(empty($_POST['searchcontact'])){
			$error = "Please enter a Contact Person's Last Name.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();

			}else{

				$result = mysqli_query($connect, $getcontact);
				//Throw error if DB connect fails
				if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
		
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}
		
				$rowcount = mysqli_num_rows($result);
				
	
				if($rowcount >= 1){ ?>
					
					 <div id='content'>

					<h1>Search Results</h1>
					<h3>Please select from the choices below:</h3>
					
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
							//Grab the values for each row in the database 
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

							echo "<p>";
							//Display all available results to users
							if($firstname == !null){echo html($firstname) . " ";}
							if($lastname == !null){echo html($lastname) . "<br />";}
							if($email == !null){echo html($email) . "<br />";}
							if($phone == !null){echo html($phone) . "<br />";}
							if($title == !null){echo html($title) . "<br />";}
							if($school == !null){echo html($school) . "<br />";}
							if($address == !null){echo html($address) . "<br />";}
							if($city == !null){echo html($city) . " ";}
							if($state == !null){echo html($state) . " ";}
							if($zip == !null){echo html($zip) . "<br />";}

							//Set up a hidden form so these values can be passed to the correct page

							//Check which form we came from
							if(isset($_POST['change_contact'])){
								//We came from changecontact/index.php
								echo "<form action='/outreach/editcontact/edit.php' method='post' >";
					
							}else{
							//otherwise we came from event/index.php
							echo "<form action='/outreach/event/addevent.php' method='post' >";
							}
								echo "<input id='contact_id' name='contact_id' type='hidden' value='".$contact_id ."' />";
								if($firstname == !null){echo "<input id='firstname' name='firstname' type='hidden' value='". $firstname ."' />";}
								if($lastname == !null){echo "<input id='contact_id' name='lastname' type='hidden' value='".$lastname ."' />";}
								if($email == !null){echo "<input id='email' name='email' type='hidden' value='".$email ."' />";}
								if($phone == !null){echo "<input id='phone' name='phone' type='hidden' value='".$phone ."' />";}
								if($title == !null){echo "<input id='title' name='title' type='hidden' value='".$title ."' />";}
								if($school == !null){echo "<input id='school' name='school' type='hidden' value='".$school ."' />";}
								if($address == !null){echo "<input id='address' name='address' type='hidden' value='".$address ."' />";}
								if($city == !null){echo "<input id='city' name='city' type='hidden' value='".$city ."' />";}
								if($state == !null){echo "<input id='state' name='state' type='hidden' value='".$state ."' />";}
								if($zip == !null){echo "<input id='zip' name='zip' type='hidden' value='".$zip ."' />";}

								echo "<input type='submit' name='selectContact' value='Select' class='f-submit' />
								<br />
			
							</form>";
							echo "</p>";
					}
					
					echo "<p>...or <a href='/outreach/event/'>search for another person.</a></p>";
	
					echo "</div>";
				
				}else {
					$error = "No Contacts Found";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
				}
			}
}



?>
