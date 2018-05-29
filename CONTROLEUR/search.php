<?php

	session_start();
	$_SESSION['articles'] = $_GET['categorie'];
	$_SESSION['categorie'] = $_GET['sous-categorie'];
	header('location: ../CONTROLEUR/Script_main_page.php');

?>
