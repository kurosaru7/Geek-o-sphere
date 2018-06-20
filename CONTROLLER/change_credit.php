<?php
	session_start();
	require("../MODEL/model.php");

	$query = getOneAccount($_SESSION['pseudo']);
	while ( $data = $query -> fetch()) {
		$credit = $data['credit'];
	}
	if ($_GET['sign'] == '-') {

		$n_credit = $credit - $_GET['number'];

	} else if ($_GET['sign'] == '+') {

		$n_credit = $credit + $_GET['number'];
	}

	if ($n_credit > 100000 || $n_credit < 0 || $_GET['number'] < 1) {

		header('location: wallet.php?error=true');

	} else {

		updateCredit($n_credit);
		header('location: wallet.php');
	}
?>