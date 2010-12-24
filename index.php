<?php
//
// Initial index page. 
// checks for login, redirects accordingly
//

session_start();

if (!isset($_SESSION['username'])) {
    //header('Location: login/');
} else {
   //header('Location: home/');
}    

?> 
