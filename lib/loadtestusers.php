<?php
require($_SERVER['DOCUMENT_ROOT'] . '/outreach/lib/nonavigation.php');

$username = 'outreach';
$hostname = 'localhost';
$password = 'password'; 
$database = 'outreach';

$connect = mysqli_connect($hostname, $username, $password, $database);

	if(!$connect){
		//throw error
		print mysqli_connect_error() . '\n';
		exit();
	}else{
	echo 'connection established';
	}

$loadUser = ("INSERT INTO users(
    username,
    password,
    user_role,
    firstname,
    lastname,
    email,
    phone)
    VALUES(
    'securepeter',
	md5('secure'),
	'u',
	'Peter',
	'Periwinkle',
	'ppeterpeter.org',
	'8015551212');");


$addUser = mysqli_query($connect, $loadUser);

if(!$addUser){

	mysqli_error($connect);
	echo 'user not loaded!';
}else{
	echo 'user added';
	}


?>

