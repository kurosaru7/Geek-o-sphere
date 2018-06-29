<?php
	session_start();
	require('../../MODEL/model.php');

	if (isset($_SESSION['co'])) {
	
		validDelivery($_GET['id']);
		$error = "<h2 style='color: LimeGreen'>Article(s) livrés !</h2>";
		header('location: ./delivery.php?error='.$error);

	} else {

		header('location: ../index.php');
	}
?>