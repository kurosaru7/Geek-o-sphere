<?php

	echo "<table>
			<th>Jour
			<th>Heure
			<th>Etat
			<th>Quantité
			<th>Point de livraison
			<th colspan=2>Article
		 "
	;

	$test = false;

	$query = historyCall();
	while ( $data = $query -> fetch()) {

		echo"<tr>
			 <td>".$data['achats.date'].
			"<td>".$data['achats.time'].
			"<td>".utf8_encode($data['achats.etat']).
			"<td>".$data['achats.quantite'].
			"<td>".$data['magasins.nom'].
			"<td>".utf8_encode($data['articles.nom']).
			"<td><a href='detailed_item.php?id=".$data['achats.idArticles']."'><button>...</button></a>"
		;
		$test = true;

	} if (!$test) {

		echo"<tr><td><td><td><td colspan=3>Aucun achat effectué";
	}

	echo"</table>";

?>