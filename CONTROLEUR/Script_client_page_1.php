<?php

	$account = getOneAccount($_SESSION['pseudo']);

	//Print all lignes of the table
	$data = $account -> fetch();
	
	$data2 = getShopName($data['idPdLs']);
	$shop_name = $data2 -> fetch();
	echo '<tr><th>Nom</th><th> '.utf8_encode($data['nom']).'</th></tr>';
	echo '<tr><th>Prenom</th><th> '.utf8_encode($data['prenom']).'</th></tr>';
	echo '<tr><th>Pseudo</th><th> '.utf8_encode($data['pseudo']).'</th></tr>';
	echo '<tr><th>Crédit</th><th> '.utf8_encode($data['credit']).'</th></tr>';
	echo '<tr><th>Point de livraison</th><th> '.$shop_name[0].'</th></tr>';
	
?>
