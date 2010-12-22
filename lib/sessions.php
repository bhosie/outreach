<?php
	session_start();
	
	require_once('db.inc.php');
	

	$authentication = "SELECT username FROM details
						WHERE username = {$_POST['username']}
						AND password = md5({$_POST['password']})";
						
	$result = mysqli_query($authentication);
	
	if(!$result) {
		$error = "Query error: " . mysqli_error($result);
		include 'error.html.php';
		exit();
		
	}
	
	$rowcount = mysqli_num_rows($result);
	
	if($rowcount == 1){
		$_SESSION['username'] = $_POST['username'];
		header('Location: /outreach/home/');
	}else {
		header('Location: /outreach/includes/html/error.html.php');
	}


?>
