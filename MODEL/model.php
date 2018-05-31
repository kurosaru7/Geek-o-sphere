<?php

function dbConnect() { //Link to the DataBase
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=geek-o-sphere', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}	
}


function getAccounts() { //Register all accounts
	$bdd = dbConnect();
	$accounts = $bdd->query('SELECT * FROM `clients` ');
	return $accounts;
}


function createAccount($f_name,$s_name,$pseudo,$pwd) { //Create account
	$bdd = dbConnect();
	$query_sign_up = $bdd->prepare('INSERT INTO clients(nom, prenom, pseudo, mdp,idPdls) VALUES (:f_name, :s_name, :pseudo, :pwd,1)');
	$query_sign_up->execute(array(
		'f_name' => $f_name,
		's_name' => $s_name,
		'pseudo' => $pseudo,
		'pwd' => $pwd
	));
}


function getArticlesCustom($query_sql) { //Create query
	$bdd = dbConnect();
	$articles = $bdd->query('SELECT * FROM `articles` '.$query_sql);
	return $articles;
}


function getArticles() { //Create query 
	$bdd = dbConnect();
	$articles = $bdd->query('SELECT * FROM `articles`');
	return $articles;
}


function addArticle($class, $f_name, $description, $image, $amount, $idShop, $price, $under_class){ //Create query
	$bdd = dbConnect();
	$articles = $bdd->prepare('INSERT INTO articles(categorie, nom, description, image, quantite, idMagasins, prix, sous_categorie) VALUES (:class, :f_name, :description, :image, :amount, :idShop, :price, :under_class)');
	$articles->execute(array(
		'class' => $class,
		'f_name' => $f_name,
		'description' => $description,
		'image' => $image,
		'amount' => $amount,
		'idShop' => $idShop,
		'price' => $price,
		'under_class' => $under_class,
	));
}

function getSelectDistinct($option) { //Create query
	$bdd= dbConnect();
	$query = $bdd->query('SELECT DISTINCT '.$option.' FROM `articles`');
	return $query;

}

