<?php
//
// /lib/admincontroller.php
//
//This file is responsible for handling the form data from admin/index.php
//

require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

//USER________________________________________________________________________________
	
if(isset($_POST['user'])){

		//Check that all fields were filled out
		if (empty($_POST['firstname']) ||  empty($_POST['lastname']) ||
			empty($_POST['emailaddress']) ||  empty($_POST['role']) ||
			empty($_POST['username']) ||  empty($_POST['password']) || ($_POST['role'] == 'Select...')){

					$error = "Please enter all the * required information";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();



				
		}


		//Check for a valid email address
		if(!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i",
						$_POST['emailaddress'])){
					
					$error = "You did not enter a valid email address. please try again.";
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
		}


		//If all fields are complete and email is valid, Ensure user does not exist already
		$checkcontact = "SELECT username FROM users
						WHERE username = '{$_POST['username']}';";
			
		$check = mysqli_query($connect, $checkcontact);
				
				
		$rowcount = mysqli_num_rows($check);
	
		if($rowcount != 0){
				$error = ("User not added! The USERNAME '{$_POST['username']}' is taken. Please enter a different USERNAME and try again.");
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
					
		}else{

		//If user is not in database, add new user.
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
				
			
				//Throw error if user was not added
				if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
					
					include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
					exit();
				}else{
					//Set variable for success page 
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
				exit();
			}
			}
		
	}


?>

