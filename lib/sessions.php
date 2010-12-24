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
		
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
		exit();
		
	}
	
	$rowcount = mysqli_num_rows($result);

	while ($row = mysqli_fetch_assoc($roleresult)) {
     $userrole = $row['user_role'];
	 $userID = $row['user_id'];
}	
	
	if($rowcount == 1){
				
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user_role'] = $userrole;
		$_SESSION['user_ID'] = $userID;
		
 
		header('Location: /outreach/home/');
	}else {
		$error = "Please provide your login credentials.";
		include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/loginerror.html.php');
	}

}
?>
