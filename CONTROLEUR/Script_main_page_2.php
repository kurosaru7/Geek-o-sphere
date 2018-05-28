<?php

	$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	session_start();

	$_SESSION['main_page1'][0] = '';
	$i = 0;
	$requete = $bdd->query('SELECT * FROM articles');
	while ( $donnees = $requete -> fetch()) {

		for ($j=0 ; $j < $i ; $j++) { 
			if ($_SESSION['main_page1'][$j] == '')
		}

	}
?>