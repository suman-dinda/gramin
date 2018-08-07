<?php
session_start();
if(isset($_SESSION['username'])){
	// remove all session variables
	session_unset(); 
	// destroy the session 
	session_destroy(); 
	echo true;
}else{
	echo false;
}

?>