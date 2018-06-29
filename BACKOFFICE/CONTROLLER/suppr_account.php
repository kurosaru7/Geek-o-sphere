<?php
	session_start();
	require('../../MODEL/model.php');

	if (isset($_SESSION['co'])) {
	
		$error = "<h2 style='color: LimeGreen'>Le compte a été supprimé !</h2>";
		supprAccount($_GET['id']);
		header('location: ../CONTROLLER/account.php?error='.$error);

	} else {

		header('location: ../index.php');
	}
?>