<?php
//
//THIS FILE IS USED TO VERIFY THAT A FORM WAS SUBMITTED TO ACCESS THE CONTROLLER AND PREVENTS
//DIRECT ACCESS TO THE CONTROLLER FILE(S).
//
if(isset($_POST['event']) || isset($_POST['contact']) ||
	isset($_POST['user']) || isset($_POST['searchsite']) || isset($_POST['searchcontact']) || isset($results)){
		//do nothing, continue with script
}else{ 
	//DIRECT NAVIGATION TO RISTRICTED PAGE! Redirect to home.
	header('Location: /outreach/home');
}
?>
