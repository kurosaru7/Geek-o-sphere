<?php
	session_start();
	require('../../MODEL/model.php');

	if (isset($_SESSION['co'])) {

		include('../VIEW/add_item.php');

	} else {

		header('location: ../index.php');
	}