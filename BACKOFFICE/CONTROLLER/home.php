<?php
	session_start();

	if (isset($_SESSION['co'])) {
	
		require('../VIEW/home.php');

	} else {

		header('location: ../index.php');
	}
?>