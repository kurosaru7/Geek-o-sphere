<?php

	echo "<table>
			<th>Jour
			<th>Heure
			<th>Etat
			<th>Quantité
			<th>Point de livraison
			<th colspan=2>Article
		 "
	; // Display all table names.

	$test = false;

	$query = historyCall(); // Recovery of the history of the client.
	while ( $data = $query -> fetch()) { // Display all informations.

		echo"<tr>
			 <td>".$data['achats.date'].
			"<td>".$data['achats.time'].
			"<td>".utf8_encode($data['achats.etat']).
			"<td>".$data['achats.quantite'].
			"<td>".utf8_encode($data['points_de_livraison.nom']).
			"<td>".utf8_encode($data['articles.nom']).
			"<td><a href='detailed_item.php?id=".$data['achats.idArticles']."'><button>...</button></a>"
		;
		$test = true;

	} if (!$test) { // Else, if there is no history to display.

		echo"<tr><td><td><td><td colspan=3>Aucun achat effectué";
	}

	echo"</table>";

?>