<?php

	session_start();
	$_SESSION['articles'] = $_GET['categorie'];

	header('location: ../VUE/main_page.php')

?>