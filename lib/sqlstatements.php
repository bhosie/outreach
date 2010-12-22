<?php
//
//this file houses the various SQL REPORTING statements used throughout the application
//


/*********************************************************************************
************************** REPORTING FUNCTIONS ***********************************/

//Reporting: Get the num of calls
$getcalls = ("SELECT COUNT(contact_type)
			FROM details
			WHERE contact_type = ph
			AND contact_date LIKE '2010-%';");	 //Need to fix the date placeholder



?>
