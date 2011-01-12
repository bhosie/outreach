<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/db.inc.php');


	
	

	
	//SEARCH______________________________________________________________________
	
	if(isset($_POST['searchsite'])){

		if(empty($_POST['searchsite'])){
			$error = "Please enter a search term.";
			include($_SERVER['DOCUMENT_ROOT'] . '/outreach/includes/html/error.html.php');
		
			}else{
			echo "<br />SEARCH TERM:" . html($_POST['searchsite']) ."<br />";
			
			}
	}




?>
