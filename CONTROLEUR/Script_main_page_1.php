<?php

	$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	session_start();

	$req="";
	if (isset($_SESSION['articles']) && $_SESSION['articles'] != '') {
		$req = 'WHERE categorie="'.$_SESSION['articles'].'"';
	}

	print ('<tr>
			<td> ID 
			<td> Categorie 
			<td> Nom 
			<td> Image 
			<td> Quantité 
			<td> Nb_Magasin 
			<td> Prix 
			<td> Sous-Categorie 
	');

	$requete = $bdd->query('SELECT * FROM articles '.$req);
	while ( $donnees = $requete -> fetch()) {

		print ('<tr>
				<td>'.utf8_encode($donnees['idArticles']).'
				<td>'.utf8_encode($donnees['categorie']).'
				<td>'.utf8_encode($donnees['nom']).'
				<td><img src="./'.utf8_encode($donnees['image']).'">
				<td>'.utf8_encode($donnees['quantite']).'
				<td>'.utf8_encode($donnees['idMagasins']).'
				<td>'.utf8_encode($donnees['prix']).'€
				<td>'.utf8_encode($donnees['sous-categorie'])
		);

	}

?>