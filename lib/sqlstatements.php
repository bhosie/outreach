<?php
//
//this file houses the various SQL REPORTING statements used throughout the application
//
//require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');

/*********************************************************************************
************************** REPORTING FUNCTIONS ***********************************/

//Get counselor/contact plus school info
$getcontact = ("SELECT contacts.contact_id, contacts.firstname, contacts.lastname,
				contacts.email, contacts.phone, 
				contacts.title, school.school_name, school.address, school.city,
				school.state, school.zip
				FROM school, contacts
    				WHERE school.school_code = contacts.school_code
				AND contacts.lastname LIKE '{$_POST['searchcontact']}';");



//Reporting: Get the num of calls
$getcalls = ("SELECT COUNT(contact_type)
			FROM details
			WHERE contact_type = ph
			AND contact_date LIKE '2010-%';");	 //Need to fix the date placeholder





?>
