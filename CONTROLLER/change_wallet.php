<?php
	session_start();
	require("../MODEL/model.php");

	$_GET['number'] = $_GET['number'];

	$query = getOneAccount($_SESSION['pseudo']); // Recovery the client account.
	while ( $data = $query -> fetch()) {
		$credit = $data['credit'];
	}
	if ($_GET['sign'] == '-') { // If you want to remove money.

		$n_credit = $credit - $_GET['number'];

	} else if ($_GET['sign'] == '+') { // If you want to add money.

		$n_credit = $credit + $_GET['number'];
	}

	if ($n_credit > 100000 || $n_credit < 0 || $_GET['number'] < 1) { // If the number is too small or too big.

		header('location: wallet.php?error=true');

	} else {

		updateCredit($n_credit); // Update money.
		header('location: wallet.php');
	}
?>