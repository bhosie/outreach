<?php
	session_start();
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
	require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');
	

	$authentication = "SELECT username FROM users
						WHERE username = '{$_POST['username']}'
						AND password = md5('{$_POST['password']}');";

	$role = "SELECT user_role FROM users
				WHERE username = '{$_POST['username']}';";

						
	$result = mysqli_query($connect, $authentication);
	$roleresult = mysqli_query($connect, $role);
	
	if(!$result || !$roleresult) {
		$error = "Query error: " . mysqli_error($connect);
		
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
		exit();
		
	}
	
	$rowcount = mysqli_num_rows($result);

	while ($row = mysqli_fetch_assoc($roleresult)) {
     $userrole = $row['user_role'];
}	
	
	if($rowcount == 1){
		
		//convert USER ROLE to string
		//$userrole = mysqli_result($roleresult);
		//If user exists, grab user role
		
		
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_role'] = $userrole;
		//echo $_SESSION['username'];
		//echo $_SESSION['user_role'];
 
		header('Location: /outreach/home/');
	}else {
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
	}


?>
