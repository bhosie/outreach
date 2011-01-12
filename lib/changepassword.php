<?php
//
// /lib/changepassword.php
//
//This file is responsible for handling the form data from password/index.php where a user changes their password
//
require('sqlstatements.php');
require('db.inc.php');

//Require the secureheader file which contains session_start()
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/secureheader.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');

	//Receive hidden flag/form-post from search controller
	if(isset($_POST['change'])){
		
		
	//Verify all fields were filled out
	if (empty($_POST['oldpassword']) ||  empty($_POST['newpassword']) ||
		empty($_POST['confirmnewpassword'])){
			$error = "Please enter all the * required information";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
	
	}
	
	
	//set variable for SQL call
	$checkPassword = "SELECT user_id, password FROM users
						WHERE user_id = '{$_SESSION['user_ID']}'
						AND password = md5('{$_POST['oldpassword']}');";

	$result = mysqli_query($connect, $checkPassword);
	
	if(!$result) {
		$error = "Query error: " . mysqli_error($connect);
		
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		exit();
		
	}

	$rowcount = mysqli_num_rows($result);

	while ($row = mysqli_fetch_assoc($result)) {
     	$userrole = $row['password'];
	 
	}	
	
	if(!$rowcount == 1){
		$error = "The password you entered does not match your current password. Please try again.";
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
	}else {
		//If we get a match on old password and entered password, verify that newpassword and confirmpassword match
		if(($_POST['newpassword']) == ($_POST['confirmnewpassword'])){
			//If they match, update password in Database

			$newpassword = ($_POST['newpassword']);

			$changePassword = ("UPDATE users
								SET password = md5('$newpassword')
								WHERE user_id = '{$_SESSION['user_ID']}';");

			$result = mysqli_query($connect, $changePassword);
	
			if(!$result) {
				$error = "Query error: " . mysqli_error($connect);
		
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
				exit();
		
			}else{
				$success = "You successfully changed your password.";
				include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/success.html.php');
			}


		}else{
			$error = "New passwords do not match. Please try again.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		}
	}

}

?>
