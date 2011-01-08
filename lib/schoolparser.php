<?php

require('db.inc.php');

//Ask for file resource
$getFile = fwrite(STDOUT, "please enter the full path of the file you want to parse: \n");

//get file name from console
$receiveFile = rtrim(fgets(STDIN));



//Open file handler for data
$file = fopen($receiveFile, "r");

		//Handle error if file can't be opened
		if(!$file){
		echo "Could not open file: '".$receiveFile."'! Aborting script.";
		exit();
		
		}else{
		echo "File: " . "'".$receiveFile."'" . " successfully opened. \n Begin parsing... \n";
		}

//While !eof, cycle through each line of data and insert into DB
$i= 1;

while(!feof($file)){
	

	$varSchool = fgets($file);




	$insertSchools = ("INSERT INTO school(
						sch_type,
						dist_code,
						school_code,
						school_name,
						address,
						address2,
						city,
						state,
						zip,
						phone,
						URL)
						VALUES(
						$varSchool);");

		$result = mysqli_query($connect, $insertSchools);
		
				
			if(!$result){
					$error = "Query error: " . mysqli_error($connect);
					echo "Error! School " . $i . " not added. ";
					echo $error . "\n";
					
				}else{
					echo "School " . $i . " added. \n";
				}

		$i++;
}


//Close file after use.
if(!fclose($file)){
	echo "Could not close the resource file.";
}else{
	echo "Resource file closed successfully";
	}

?>
