<?php
session_start();
ob_start();
	if(!isset($_SESSION['nombre'])){
		header("Location: ../Index.php"); 
	  	exit(); 
	}
?>