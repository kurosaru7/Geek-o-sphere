<?php
	session_start();
	require('../MODEL/model.php');

	//voir l'état des articles
	$count = 0;

	$query = paymentCall();
	while ($data = $query -> fetch()) {
		
		if ($data['articles.quantite'] < $data['achats.quantite']) {

			$test = true;

		} else {
			var_dump($_GET);
			buy($data['articles.nom'], $data['achats.idAchats'], ($data['articles.quantite']-$data['achats.quantite']), $_GET['pdl']);
			$count = $count + ($data['articles.prix']*$data['achats.quantite']);
		}
		$wallet = $data['clients.credit'];
	}

	if ($count >= 1500) {

		$reduc = $count * (35/100);
		$count = $count - $reduc;

	} else if ($count >= 1000) {

		$reduc = $count * (25/100);
		$count = $count - $reduc;

	} else if ($count >= 500) {

		$reduc = $count * (15/100);
		$count = $count - $reduc;

	} else if ($count >= 250) {

		$reduc = $count * (10/100);
		$count = $count - $reduc;

	} else if ($count >= 100) {

		$reduc = $count * (5/100);
		$count = $count - $reduc;

	}

	$count = round($count, 2);

	emptyWallet($wallet-$count);

	if (isset($test)) {

		$error = '<div class="alert3">erreur !</div>';
		header('location: ./basket.php?error='.$error);

	} else {

		$error = '<div class="valide2">Paiement effectué !</div>';
		header('location: ./basket.php?error='.$error);

	}
?>