<?php
	session_start();
	require("../../MODEL/model.php");

	if (isset($_SESSION['co'])) {

		removeBasket($_GET['id']);
		header("location:./history.php");

	} else {

		header('location: ../index.php');
	}
?>