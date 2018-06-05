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

function getOneAccount($pseudo) { //Register all accounts
	$bdd = dbConnect();
	$accounts = $bdd->query('SELECT * FROM `clients` WHERE pseudo="'.$pseudo.'"');
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


function getItems() { //Create query 
	$bdd = dbConnect();
	$items = $bdd->query('SELECT * FROM `articles`');
	return $items;
}

function getShops(){
	$bdd = dbConnect();
	$shops = $bdd->query('SELECT * FROM `magasins`');
	return $shops;
}


function addItem($class, $name, $description, $picture, $quantity, $idShop, $price, $subclass){ //Create query
	$bdd = dbConnect();
	$items = $bdd->prepare('INSERT INTO articles(categorie, nom, description, image, quantite, idMagasins, prix, sous_categorie) VALUES (:class, :name, :description, :picture, :quantity, :idShop, :price, :subclass)');
	$items->execute(array(
		'class' => $class,
		'name' => $name,
		'description' => $description,
		'picture' => $picture,
		'quantity' => $quantity,
		'idShop' => $idShop,
		'price' => $price,
		'subclass' => $subclass,
	));
}


function getSelectDistinct($option) { //Create query
	$bdd= dbConnect();
	$query = $bdd->query('SELECT DISTINCT '.$option.' FROM `articles`');
	return $query;
}

