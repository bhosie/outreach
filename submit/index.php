<?php
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header('Location: /login/');
	}
	
?>	
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
<title>Utah Higher Education - Outreach</title>
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
		<div id="site-name">Utah Higher Education - Outreach</div>
		<div id="search">
			<form action="">
			<label for="searchsite">Site Search:</label>
			<input id="searchsite" name="searchsite" type="text" />
			<input type="submit" value="Go" class="f-submit" />
			</form>
		</div>
		<ul id="nav">
		<li><a href="/login/">Home</a></li>
		<li class="active"><a href="/submit/">Submit</a></li>
		<li><a href="/reports/">Reports</a></li>
		<li><a href="/admin/">Admin</a></li>
		<li><a href="/logout/">Logout</a></li>
		</ul>
	</div>
	
	<div id="content-wrap">
	
		<div id="utility">

			<ul id="nav-secondary">
			<li class="first"><a href="#">Latinus Wordus</a></li>
			<li><a href="#">Catsnamus Mitenus</a></li>
			<li class="active"><a href="#">Beautus Weatherus</a></li>
			<li><a href="#">Bottomus Navigationus</a></li>
			<li><a href="#">Gee my neckus issore</a></li>
			<li class="last"><a href="#">Last buttus notleastus</a></li>
			</ul>
		</div>
		
		<div id="content">
		
			<form action="forms.html" method="post" class="f-wrap-1">
			
			<div class="req"><b>*</b> Indicates required field</div>
			
			<fieldset>
			
			<h3>Outreach Database</h3>
			
			<label for="firstname"><b><span class="req">*</span>First name:</b>
			<input id="firstname" name="firstname" type="text" class="f-name" tabindex="1" /><br />
			</label>
			
			<label for="lastname"><b><span class="req">*</span>Last name:</b>
			<input id="lastname" name="lastname" type="text" class="f-name" tabindex="2" /><br />
			</label>
			
			<label for="emailaddress"><b><span class="req">*</span>Email Address:</b>
			<input id="emailaddress" name="emailaddress" type="text" class="f-email" tabindex="3" /><br />
			</label>
			
			<label for="enquiry"><b>Enquiry Type:</b>
			<select id="enquiry" name="enquiry" tabindex="4">
			<option>Select...</option>
			<option>c nulla. Fusce tincidu</option>
			<option>Maecenas digniss</option>
			<option>tincidunt arcu eget sapien</option>
			</select>
			<br />
			</label>
			
			<fieldset class="f-checkbox-wrap">
			
			<b>Colour:</b>
			
				<fieldset>
				
				<label for="blue">
				<input id="blue" type="checkbox" name="checkbox" value="checkbox" class="f-checkbox" tabindex="5" />
				sit amet, consectetu</label>
				
				<label for="green">
				<input id="green" type="checkbox" name="checkbox2" value="checkbox" class="f-checkbox" tabindex="6" />
				c nulla. Fusce tincidu</label>
				
				<label for="yellow">
				<input id="yellow" type="checkbox" name="checkbox3" value="checkbox" class="f-checkbox" tabindex="7" />
				tincidunt arcu eget </label>
				</fieldset>
				
			</fieldset> 
			
			<fieldset class="f-radio-wrap">
		
			<b>Country:</b>
			
				<fieldset>
				
				<label for="australia">
				<input id="australia" type="radio" name="radio" value="Australia" class="f-radio" tabindex="8" />
				Australia</label>
				
				<label for="newzealand">
				<input id="newzealand" type="radio" name="radio" value="New Zealand" class="f-radio" tabindex="9" />
				New Zealand</label>
				
				<label for="antarctica">
				<input id="antarctica" type="radio" name="radio" value="Antarctica" class="f-radio" tabindex="10" />
				Antarctica</label>
	
				</fieldset>
			
			</fieldset>

			<div id="footer">
			<p>Insert footer here.</p>
			<p><a href="#">Contact Us</a> | <a href="#">Privacy</a> | <a href="#">Links</a></p>
			</div>

		</div>
		
		<div id="poweredby"><a href="http://farcry.daemon.com.au/"><img src="../includes/wsimages/mollio.gif" alt="FarCry - Mollio" /></a></div>
		
	</div>
	
</div>
</body>
</html>
