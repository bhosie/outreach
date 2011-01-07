<?php

require('db.inc.php');

//Open file handler for data
$file = fopen("/opt/local/apache2/htdocs/outreach/lib/districts.txt", "r")
			or die("Could not open file 'districts.txt'");

//While !eof, cycle through each line of data and insert into DB
$i= 1;

while(!feof($file)){
	

	$varDistrict = fgets($file);




	$insertDistricts = ("INSERT INTO district(
						dist_code,
						dist_name,
						address,
						address2,
						city,
						state,
						zip,
						phone,
						URL)
						VALUES(
						$varDistrict);");

		$result = mysqli_query($connect, $insertDistricts);
		
				
				
				
				
			if(!$result) {
					$error = "Query error: " . mysqli_error($connect);
					echo "Error! District " . $i . " not added. ";
					echo $error . "\n";
					//exit();
				}else{
					echo "District " . $i . " added. \n";
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
