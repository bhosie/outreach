<?php
	//EVENT
	if(isset($_POST['event'])){

  	echo "Date: {$_POST['date']}<br />";
    echo "Inquiry: {$_POST['inquiry']}<br />";
    echo "Attended: {$_POST['attendance']}<br /><br />";
	echo "Contact Type: {$_POST['radio']}<br /><br />";
	echo "Notes: {$_POST['notes']}<br /><br />";
  
    var_dump($_POST);
	
	//USER
	}else if(isset($_POST['user'])){

		echo "First Name: {$_POST['firstname']}<br />";
		echo "Last Name: {$_POST['lastname']}<br />";
		echo "Email: {$_POST['emailaddress']}<br />";
		echo "User Role: {$_POST['role']}<br />";
		echo "UserName: {$_POST['username']}<br />";
		echo "Pass: {$_POST['password']}<br />";

	


	//CONTACT
	}else if(isset($_POST['contact'])){
		
		echo "FirstName: {$_POST['firstname']}<br />";
		echo "LastName: {$_POST['lastname']}<br />";
		echo "Phone: {$_POST['phone']}<br />";
		echo "Email: {$_POST['emailaddress']}<br />";
		echo "Title: {$_POST['jobtitle']}<br />";
		echo "School: {$_POST['schoolcode']}<br />";
		echo "Alt School: {$_POST['altschoolcode']}<br />";
		echo "Lead: {$_POST['lead']}<br />";
		

	//LOGIN
	}else if(isset($_POST['login'])){
		//header('Location: /outreach/home/');
		//require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/sessions.php');
		echo "UserName: {$_POST['username']}<br />";
		echo "Pass: {$_POST['password']}<br />";
		
		//Redirect to home
		//header('Location: /outreach/home/');
		



	//SEARCH
	}else if(isset($_POST['search'])){

		echo "SEARCH TERM: {$_POST['search']}<br />";

	}
?>
