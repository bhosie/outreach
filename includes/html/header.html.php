<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
Copyright: Daemon Pty Limited 2006, http://www.daemon.com.au
Community: Mollio http://www.mollio.org $
License: Released Under the "Common Public License 1.0", 
http://www.opensource.org/licenses/cpl.php
License: Released Under the "Creative Commons License", 
http://creativecommons.org/licenses/by/2.5/
License: Released Under the "GNU Creative Commons License", 
http://creativecommons.org/licenses/GPL/2.0/
-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>UHEAA Outreach Services</title>
<link rel="stylesheet" type="text/css" href="../includes/css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../includes/css/print.css" media="print" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6_or_less.css" />
<![endif]-->
<script type="text/javascript" src="../includes/js/common.js"></script>
</head>
<body id="type-b">
<div id="wrap">


	<div id="header">
		<div id="site-name">UHEAA Outreach Services</div>
		<div id="search">
			<form action="../lib/controller.php" method="post">
			<label for="searchsite">Site Search:</label>
			<input id="searchsite" name="searchsite" type="text" />
			<input type="submit" name="search" value="Search" class="f-submit" />
			</form>
		</div>

		<?php
			//Set $sessionvar to null if no session is present to avoid an error in the nav menu
			if(isset($_SESSION['user_role'])){
				$sessionvar = $_SESSION['user_role'];
				}else{
					$sessionvar = null;
				}
		?>

		<ul id="nav">
		<li<?php if( $_SERVER['PHP_SELF'] == '/outreach/home/index.php'){echo " class='active'";} ?>><a href="/outreach/home/">Home</a></li>
		<li<?php if( $_SERVER['PHP_SELF'] == '/outreach/event/index.php'){echo " class='active'";} ?> ><a href="/outreach/event/">Events</a></li>
		<li<?php if( $_SERVER['PHP_SELF'] == '/outreach/newcontact/index.php'){echo " class='active'";} ?>><a href="/outreach/newcontact/">New Contact</a></li>
		<!--<li<?php if( $_SERVER['PHP_SELF'] == '/outreach/reports/index.php'){echo " class='active'";} ?>><a href="/outreach/reports/">Reports</a></li>-->
		<!--<li<?php if( $_SERVER['PHP_SELF'] == '/outreach/directory/index.php'){echo " class='active'";} ?>><a href="/outreach/directory/">Directory</a></li>-->
		<?php
			//Only display admin link if user is an admin.
			if($sessionvar == 'A' && $_SERVER['PHP_SELF'] == '/outreach/admin/index.php'){
				echo "<li class='active'><a href='/outreach/admin/'>Admin</a></li>";
			}else if($sessionvar == 'A' && $_SERVER['PHP_SELF'] != '/outreach/admin/index.php'){
				echo "<li><a href='/outreach/admin/'>Admin</a></li>";
			}else{
				//If the user is not an admin do not display link
			}

		?>
	
		<?php
			//Check to see if we are logged in
			if(isset($_SESSION['username'])){
				$loggedin = TRUE;
			}else{
				$loggedin = FALSE;
			}
		
			//Only display these links if user is logged in.

			//Edit Contact Link
			if($loggedin == TRUE && $_SERVER['PHP_SELF'] == '/outreach/editcontact/index.php'){
				echo "<li class='active'><a href='/outreach/editcontact/'>Edit Contact</a></li>";
			}else if($loggedin == TRUE && $_SERVER['PHP_SELF'] != '/outreach/editcontact/index.php'){
				echo "<li><a href='/outreach/editcontact/'>Edit Contact</a></li>";
			}else{
				//If the user is not logged in do not display link
			}
			//Change Password link
			if($loggedin == TRUE && $_SERVER['PHP_SELF'] == '/outreach/password/index.php'){
				echo "<li class='active'><a href='/outreach/password/'>Password</a></li>";
			}else if($loggedin == TRUE && $_SERVER['PHP_SELF'] != '/outreach/password/index.php'){
				echo "<li><a href='/outreach/password/'>Password</a></li>";
			}else{
				//If the user is not logged in do not display link
			}

			//Logout link
			if($loggedin == TRUE && $_SERVER['PHP_SELF'] == '/outreach/logout/index.php'){
				echo "<li class='active'><a href='/outreach/logout/'>Logout</a></li>";
			}else if($loggedin == TRUE && $_SERVER['PHP_SELF'] != '/outreach/logout/index.php'){
				echo "<li><a href='/outreach/logout/'>Logout</a></li>";
			}else{
				//If the user is not logged in do not display link
			}

		?>
		
		</ul>
	</div>











