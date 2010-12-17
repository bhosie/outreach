<?php

//Reporting: Get the num of calls
$getcalls = ("SELECT COUNT(contact_type)
			FROM details
			WHERE contact_type = ph
			AND contact_date LIKE '2010-%';") //Need to fix the date placeholder


//Insert New Event
$newEvent = ("INSERT INTO details (
			contact_date,
			contact_type,
			num_attend,
			in_out,
			notes)
			VALUES(
			{$_POST['date']}
			{$_POST['inqury']}
			{$_POST['attendance']}
			{$_POST['contact-type']}
			{$_POST['notes']});")

//Insert New Contact
$newContact = ("INSERT INTO contacts(
				firstname,
				lastname,
				phone,
				email,
				title,
				school_code,
				alt_school_code,
				lead)
				VALUES(
				{$_POST['firstname']}
				{$_POST['lastname']}
				{$_POST['phone']}
				{$_POST['emailaddress']}
				{$_POST['jobtitle']}
				{$_POST['schoolcode']}
				{$_POST['altschoolcode']}
				{$_POST['lead']});")


			

?>
