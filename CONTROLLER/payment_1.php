<?php

	echo "<table>
			<th>Article
			<th>Quantité
			<th>Prix unitaire
			<th colspan=2>Détail
		 "
	;

	$test = false;
	$count = 0;

	$query = paymentCall();
	while ( $data = $query -> fetch()) {

		$count = $count + ($data['articles.prix']*$data['achats.quantite']);
		$money = $data['clients.credit'];

		echo"<tr>";
			echo "<td>".utf8_encode($data['articles.nom']);

			echo "<td>".$data['achats.quantite'].
				 "<td>".$data['articles.prix']." €
				  <td colspan=2>".($data['articles.prix']*$data['achats.quantite'])." €";
		$test = true;

	} if (!$test) {

		echo"<tr><td><td><td colspan=3>Panier vide";
	}
	echo "</table><br><br>";

	if (isset($money) && $count > $money) {
		
		echo "Prix Total --> ".$count." €<br>
			  Credit actuel --> ".$money." €<br><br>
			  <a href='./wallet.php'>
			  	<button class='button3'>Réaprovisionner</button>
			  </a>";

	} else if (isset($money)) {

		echo "Prix Total --> ".$count." €<br>
			  Credit actuel --> ".$money." €<br><br>
			  <form action='./payment_exe.php' method='get'>

			  	Point de livraison : <select name='pdl'>";

		$query = getShops();
		while ($data = $query ->fetch()) {

			echo "<option value='".$data['idMagasins']."'>".$data['nom']."</option>";
		}

		echo "	</select><br>
				<button class='button'>Payer</button>
			  </form>";

	}
	
?>