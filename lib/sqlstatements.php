<?php
//
//this file houses the various SQL REPORTING statements used throughout the application
//
//require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');

/*********************************************************************************
************************** REPORTING FUNCTIONS ***********************************/

//Get counselor/contact plus school info
if(isset($_POST['searchcontact'])){
$getcontact = ("SELECT contacts.contact_id, contacts.firstname, contacts.lastname,
				contacts.email, contacts.phone, 
				contacts.title, school.school_name, school.address, school.city,
				school.state, school.zip
				FROM school, contacts
    				WHERE school.school_code = contacts.school_code
				AND contacts.lastname LIKE '{$_POST['searchcontact']}';");
}

//Search the Directory
if(isset($_POST['searchdirectory'])){
$getdirectory = ("SELECT contacts.contact_id, contacts.firstname, contacts.lastname,
				contacts.email, contacts.phone, 
				contacts.title, school.school_name, school.address, school.city,
				school.state, school.zip
				FROM school, contacts
    				WHERE contacts.lastname LIKE '{$_POST['searchdirectory']}';");
}

//Reporting: Get the num of calls
$getcalls = ("SELECT COUNT(contact_type)
			FROM details
			WHERE contact_type = ph
			AND contact_date LIKE '2010-%';");	 //Need to fix the date placeholder



//get a list of school names for dropdown menu
$getSchoolNames=("SELECT school_name FROM school;");


?>
