<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
	//require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');
	
if(isset($_POST['login'])){
	$authentication = "SELECT username FROM users
						WHERE username = '{$_POST['username']}'
						AND password = md5('{$_POST['password']}');";

	$role = "SELECT user_role, user_id FROM users
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
}	
	
	if($rowcount == 1){
		//if user is found, start a session. throughout app, session_start() will be 
		//carried by secureheader.html.php
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_role'] = $userrole;
		$_SESSION['user_ID'] = $userID;
		
 
		header('Location: /outreach/home/');
	}else if($rowcount > 1){
			$error = "More than one account exists with this USERNAME. Please contact the administrator.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
			exit();

		}else {
			$error = "Could not log in. Please check your login credentials and try again.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
			exit();

	}

}
?>
