<?php

	$account = getOneAccount($_SESSION['pseudo']);

	//Print all lignes of the table
	$data = $account -> fetch();

	$data2 = getShopName($data['idPdLs']);
	while ($shop_name = $data2 -> fetch()) {
		echo '<br>
		';
		echo '<br><input type="text" class="connection_text" placeholder="Nom"name="nom" value="'.utf8_encode($data['nom']).'">
		';
		echo '<br><input type="text" class="connection_text" placeholder="Prénom"name="prenom" value="'.utf8_encode($data['prenom']).'">
		';
		echo '<br><input type="text" class="connection_text" placeholder="Pseudo"name="pseudo" value="'.utf8_encode($data['pseudo']).'">
		';
		echo '<br><input type="text" class="connection_text" placeholder="Point de livraison"name="pdl" value="'.$shop_name[0].'">
		';
		echo '<br><input type="password" class="connection_text" name="pwd1" placeholder="Nouveau mot de passe">
		';
		echo '<br><input type="password" class="connection_text" name="pwd2" placeholder="Confirmer mot de passe">
		';
	}
?>