<?php
//
// lib/sessions.php
//
//This file is responsible for checking login credentials and starting a session if login is successful. Session is carried throughout app by includes/secureheader.html.php
	
require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');

//Include header
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/header.html.php');

//include sidebar content
include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/sidebar.html.php');
	
if(isset($_POST['login'])){
	
	//Check login credentials
	$authentication = "SELECT username FROM users
						WHERE username = '{$_POST['username']}'
						AND password = md5('{$_POST['password']}');";

	//Get the user's role/ access level so that appropriate permissions are enforced
	$role = "SELECT user_role, user_id, firstname FROM users
				WHERE username = '{$_POST['username']}';";

						
	$result = mysqli_query($connect, $authentication);
	$roleresult = mysqli_query($connect, $role);
	
	if(!$result || !$roleresult) {
		$error = "Query error: " . mysqli_error($connect);
		$error = "result || role result error";
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
		exit();
		
	}
	
	$rowcount = mysqli_num_rows($result);

	while ($row = mysqli_fetch_assoc($roleresult)) {
     $userrole = $row['user_role'];
	 $userID = $row['user_id'];
	$firstname = $row['firstname'];
}	
	
	if($rowcount == 1){
		//if user is found, start a session. throughout app, session_start() will be 
		//carried by secureheader.html.php
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_role'] = $userrole;
		$_SESSION['user_ID'] = $userID;
		$_SESSION['firstname'] = $firstname;

		
 
		header('Location: /outreach/home/');
	}else if($rowcount > 1){
			$error = "More than one account exists with this USERNAME. Please contact the administrator.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();

		}else {
			$error = "Could not log in. Please check your login credentials and <a href='/outreach/login/'>try again.</a>";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
			exit();

	}

}
?>
