<?php
	session_start();
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');
	

	$authentication = "SELECT username FROM users
						WHERE username = '{$_POST['username']}'
						AND password = md5('{$_POST['password']}');";

	echo 'This is $authentication: ' . $authentication;
						
	$result = mysqli_query($connect, $authentication);
	
	if(!$result) {
		$error = "Query error: " . mysqli_error($connect);
		
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
		exit();
		
	}
	
	$rowcount = mysqli_num_rows($result);
	
	if($rowcount == 1){
		$_SESSION['username'] = $_POST['username'];
		header('Location: /outreach/home/');
	}else {
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
	}


?>
