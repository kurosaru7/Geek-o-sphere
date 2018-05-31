<?php

function dbConnect() {
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}	
}


function getAccounts() {
	$bdd = dbConnect();
	$accounts = $bdd->query('SELECT * FROM `clients` ');
	return $accounts;
}


function createAccount($nom,$prenom,$pseudo,$mdp) {
	$bdd = dbConnect();
	$requete_inscription = $bdd->prepare('INSERT INTO clients(nom, prenom, pseudo, mdp,idPdls) VALUES (:nom, :prenom, :pseudo, :mdp,1)');
	$requete_inscription->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'pseudo' => $pseudo,
		'mdp' => $mdp
	));
}


function getArticlesCustom($requete_sql) {
	$bdd = dbConnect();
	$articles = $bdd->query('SELECT * FROM `articles` '.$requete_sql);
	return $articles;
}


function getArticles() {
	$bdd = dbConnect();
	$articles = $bdd->query('SELECT * FROM `articles`');
	return $articles;
}


function addArticle($categorie, $nom, $description, $image, $quantite, $idMagasins, $prix, $sous_categorie){
	$bdd = dbConnect();
	$articles = $bdd->prepare('INSERT INTO articles(categorie, nom, description, image, quantite, idMagasins, prix, sous_categorie) VALUES (:categorie, :nom, :description, :image, :quantite, :idMagasins, :prix, :sous_categorie)');
	$articles->execute(array(
		'categorie' => $categorie,
		'nom' => $nom,
		'description' => $description,
		'image' => $image,
		'quantite' => $quantite,
		'idMagasins' => $idMagasins,
		'prix' => $prix,
		'sous_categorie' => $sous_categorie,
	));
}



