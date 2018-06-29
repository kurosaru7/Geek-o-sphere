<?php
	session_start();
	require('../../MODEL/model.php');

	if (isset($_SESSION['co'])) {

		include('../VIEW/account.php');

	} else {

		header('location: ../index.php');
	}
?>