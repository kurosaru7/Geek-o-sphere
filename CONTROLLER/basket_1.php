<?php

	echo "<table>
			<th>Jour
			<th>Heure
			<th>Etat
			<th>Quantité
			<th colspan=2>Article
		 "
	;

	$test = false;

	$query = basketCall();
	while ( $data = $query -> fetch()) {

		echo"<tr>
			 <td>".$data['achats.date'].
			"<td>".$data['achats.time'].
			"<td>".utf8_encode($data['achats.etat']).
			"<td>".$data['achats.quantite'].
			"<td>".utf8_encode($data['articles.nom']).
			"<td><a href='./remove_basket.php?id=".$data['achats.id']."'><button>Annuler</button></a>"
		;
		$test = true;

	} if (!$test) {

		echo"<tr><td><td><td colspan=3>Panier vide";
	}

	print_r($data);

?>