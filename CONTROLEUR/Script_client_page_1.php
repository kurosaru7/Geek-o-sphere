<?php

	print ('<tr>
				<th> ID 
				<th> Nom
				<th> Prénom
				<th> Pseudo 
				<th> Crédit
				<th> ID PdL 		
			</tr> 
	');

	$articles = getOneAccount($_SESSION['pseudo']);
	while ( $data = $articles -> fetch()) { 							 //Print all lignes of the table

		print ('<tr>
				<td>'.utf8_encode($data['idClients']).'
				<td>'.utf8_encode($data['nom']).'
				<td>'.utf8_encode($data['prenom']).'
				<td>'.utf8_encode($data['pseudo']).'
				<td>'.utf8_encode($data['credit']).'
				<td>'.utf8_encode($data['idPdLs'])
		);

	}

?>
