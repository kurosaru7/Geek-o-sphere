<?php

	session_start(); //Register SELECTs
	$_SESSION['articles'] = $_GET['class'];
	$_SESSION['categorie'] = $_GET['under-class'];
	header('location: ../CONTROLEUR/Script_main_page.php');

?>
