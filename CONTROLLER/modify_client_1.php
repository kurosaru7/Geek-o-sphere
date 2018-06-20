<?php

	$account = getOneAccount($_SESSION['pseudo']);

	//Print all lignes of the table
	$data = $account -> fetch();
	
	$data2 = getShopName($data['idPdLs']);
	while ($shop_name = $data2 -> fetch()) {
		echo '<br>
		';
		echo '<br><input type="text" name="prenom" value="'.utf8_encode($data['prenom']).'">
		';
		echo '<br><input type="text" name="pseudo" value="'.utf8_encode($data['pseudo']).'">
		';
		echo '<br><input type="text" name="pdl" value="'.$shop_name[0].'">
		';
	}
?>