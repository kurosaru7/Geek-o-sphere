<?php
	session_start();
	require('../../MODEL/model.php');

	if (isset($_SESSION['co'])) {

		include('../VIEW/restocking.php');

	} else {

		header('location: ../index.php');
	}
?>