<?php

	$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	session_start();
	$req="";
	if ( isset($_GET['article'])) {
		$req = 'WHERE article="'.$_GET['article'].'"';
	}

	$requete = $bdd->query('SELECT * FROM articles '.$req);
	while ( $donnees = $requete -> fetch()) {

		print (utf8_encode('
				ID = '.				$donnees['idArticles'].'	<br>
				Catégorie = '.		$donnees['categorie'].'		<br>
				Nom = '.			$donnees['nom'].'			<br>
				Description = '.	$donnees['description'].'	<br>
				Image = '.			$donnees['image'].'			<br>
				Quantité = '.		$donnees['quantite'].'		<br>
				Magasin = '.		$donnees['idMagasins'].'	<br>
				Prix = '.			$donnees['prix'].'€			<br>
				Sous Catégorie = '.	$donnees['sous-categorie'].'<br><br>'));

	}

?>