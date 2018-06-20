<?php

	session_start(); //Register SELECTs
	$_SESSION['articles'] = $_GET['class'];
	$_SESSION['categorie'] = $_GET['under-class'];
	if ($_GET['chain'] != "") {
		$_SESSION['chain'] = explode(" ", $_GET['chain']);
	} else {
		$_SESSION['chain'] = "";
	}
	$_SESSION['order'] = $_GET['order'];
	header('location: ../CONTROLLER/main_page.php');

?>