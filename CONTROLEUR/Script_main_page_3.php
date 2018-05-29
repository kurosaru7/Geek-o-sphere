<?php

	$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	session_start();

	$requete = $bdd->query('SELECT * FROM articles');
	while ( $donnees = $requete -> fetch()) {



	}
?>