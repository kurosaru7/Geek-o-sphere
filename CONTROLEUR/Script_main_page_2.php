<?php

	$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$requete = $bdd->query('SELECT DISTINCT categorie FROM articles');
	while ( $donnees = $requete -> fetch()) {

		echo '<option value="'.$donnees['categorie'].'">'.$donnees['categorie'].'</option>';
	
	}
?>