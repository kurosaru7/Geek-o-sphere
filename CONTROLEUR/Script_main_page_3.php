<?php

	$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$i = 0;
	$requete = $bdd->query('SELECT DISTINCT sous_categorie FROM articles');
	while ( $donnees = $requete -> fetch()) {

		echo '<option value="'.$donnees['sous_categorie'].'">'.$donnees['sous_categorie'].'</option>';
		
	}
?>