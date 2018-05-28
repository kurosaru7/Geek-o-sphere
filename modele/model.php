<?php
function getAccounts() {

	$bdd = dbConnect();
	$accounts = $bdd->query('SELECT * FROM `Clients` ');
	return $accounts;
}

function createAccount($nom,$prenom,$pseudo,$mdp) {
	$bdd = dbConnect();
	$requete_inscription = $bdd->prepare('INSERT INTO Clients(nom, prenom, pseudo, mdp) VALUES (:nom, :prenom, :pseudo, :mdp)');
	$requete_inscription->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'pseudo' => $pseudo,
		'mdp' => $mdp
	));

}

function dbConnect() {

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=Geek-O-Sphere', 'root', '9C9D9HNn', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}	

};


