<?php

	echo "<table>
			<th>Jour
			<th>Heure
			<th>Etat
			<th colspan>Quantité
			<th>Article
			<th>Modifier Quantité
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

			echo  "<td>".utf8_encode($data['articles.nom']);

			echo "<form action='change_quantite.php' method='POST'>";
			echo "<input type='hidden' name='id' value=".$data['achats.idArticles'].">";
			echo "<td><select name='quantite_u'>";
			for($i=1;$i<$data['articles.quantite']+1;$i++){
      	echo '<option value ='.$i.'>'.$i.'</option>';
       }
			echo "</select>
			<input type='submit' value='Modifier'>
			</form>";

			echo "<td><a href='./detailed_item.php?id=".$data['achats.idArticles']."'><button>...</button></a>".
			"<td><a href='./remove_basket.php?id=".$data['achats.id']."'><button>Annuler</button></a>";
		$test = true;

	} if (!$test) {

		echo"<tr><td><td><td><td><td colspan=2>Panier vide";
	}

	echo "</table>";

	if ($test) {

		echo '  <br>
			    <a href="./payment.php">
				    <button class="button">Payer</button>
			    </a>';
	}
?>