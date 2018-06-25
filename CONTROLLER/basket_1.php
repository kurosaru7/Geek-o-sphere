<?php

	echo "<table>
			<th>Jour
			<th>Heure
			<th>Etat
			<th colspan>Quantité
			<th>Article
			<th colspan=2>Détail
		 "
	;

	$test = false;


	$query = basketCall();
	while ( $data = $query -> fetch()) {

		echo"<tr>
			 <td>".$data['achats.date'].
			"<td>".$data['achats.time'].
			"<td>".utf8_encode($data['achats.etat']).
			"<td>";

			echo $data['achats.quantite'];

			echo  "<td>".utf8_encode($data['articles.nom']).
			"<td><a href='./detailed_item.php?id=".$data['achats.idArticles']."'><button>...</button></a>".
			"<td><a href='./remove_basket.php?id=".$data['achats.id']."'><button>Annuler</button></a>";
		$test = true;

	} if (!$test) {

		echo"<tr><td><td><td colspan=3>Panier vide";
	}

?>