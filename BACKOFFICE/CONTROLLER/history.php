<?php
	session_start();
	require('../../MODEL/model.php');

	if (isset($_SESSION['co'])) {

		if (!isset($_SESSION['id'])) {

  			$_SESSION['id'] = "";

		} if (!isset($_SESSION['clients'])) {

  			$_SESSION['clients'] = "";
		}
		include('../VIEW/history.php');

	} else {

		header('location: ../index.php');
	}
?>