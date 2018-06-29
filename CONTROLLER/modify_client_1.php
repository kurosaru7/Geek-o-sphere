<?php

	$account = getOneAccount($_SESSION['pseudo']);

	//Print all lignes of the table
	$data = $account -> fetch();

	$data2 = getPdlName($data['idPdLs']);
	while ($shop_name = $data2 -> fetch()) {
		echo '<br>
		';
		echo '<br><input type="text" maxlength=30 class="connection_text" placeholder="Nom"name="nom" value="'.utf8_encode($data['nom']).'">
		';
		echo '<br><input type="text" maxlength=30 class="connection_text" placeholder="Prénom" name="prenom" value="'.utf8_encode($data['prenom']).'">
		';
		echo '<br><input type="text" maxlength=45 class="connection_text" placeholder="Pseudo"name="pseudo" value="'.utf8_encode($data['pseudo']).'">
		';
		echo '<br><input type="text" class="connection_text" placeholder="Point de livraison"name="pdl" value="'.utf8_encode($shop_name[0]).'">
		';
		echo '<br><input type="password" maxlength=80 class="connection_text" name="pwd1" placeholder="Nouveau mot de passe">
		';
		echo '<br><input type="password" maxlength=80 class="connection_text" name="pwd2" placeholder="Confirmer mot de passe">
		';
	}
?>