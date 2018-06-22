<?php

	$account = getOneAccount($_SESSION['pseudo']);

	//Print all lignes of the table
	$data = $account -> fetch();

	$data2 = getShopName($data['idPdLs']);
	while ($shop_name = $data2 -> fetch()) {
		echo '	<tr>
				<td style="text-align:center"; > Nom : '.utf8_encode($data['nom']).'</th>
				</tr>';
		echo '<tr>
				<td style="text-align:center";> Prénom : '.utf8_encode($data['prenom']).'</th>
				</tr>';
		echo '<tr>
				<td style="text-align:center";> Pseudo : '.utf8_encode($data['pseudo']).'</th>
				</tr>';
		echo '<tr>
				<td style="text-align:center";> Crédit : '.utf8_encode($data['credit']).' € </th>
				</tr>';
		echo '<tr>
				<td style="text-align:center";> Votre point de livraison : '.$shop_name[0].'</th>
				</tr>';
	}
?>