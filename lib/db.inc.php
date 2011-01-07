<?php 
//
//This file is responsible for connecting to the database and include security "Helper" Files
//
//

//HELPER files for security
require('htmlout.php');
require('stripslashes.php');
//require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');

//Set variables to connect to DB
$username = 'outreach';
$hostname = 'localhost';
$password = 'password'; 
$database = 'outreach';



$connect = mysqli_connect($hostname, $username, $password, $database);

	if(!$connect){
		//throw error
		print mysqli_connect_error();
		exit();
	}else{
	echo 'connection established';
	}
	
/*
	if(!mysql_set_charset($connect, 'utf8')){
		//throw error
		print mysqli_error($connect);
		exit();
	}
*/

//Create DB Tables
/*
$createDB = "CREATE TABLE school
(
id int NOT NULL AUTO_INCREMENT,
school_code char(3) NULL,
address varchar(255) NULL,
city char(30) NULL,
state char(2) NULL,
zip char(10) NULL, 
phone char(10) NULL,
URL char(255) NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARACTER SET utf8";

if(!mysqli_query($connect, $createDB)){
	//Throw Error
	print mysqli_error($connect);
	echo "\n did not create tables\n";
	exit();
	
}else{
echo 'Table Created! We win!';
}
*/

//mysqli_close($connect);



?>
