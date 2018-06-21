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
  $query_sign_up = $bdd->prepare('INSERT INTO clients(nom, prenom, pseudo, mdp,idPdls,credit) VALUES (:f_name, :s_name, :pseudo, :pwd,1,0)');
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

function getShopName($idPdLs){
  $bdd = dbConnect();
  $shop_name = $bdd->prepare('SELECT `nom` FROM `points_de_livraison` WHERE idPdLs = ? ');
  $shop_name->execute(array($idPdLs));
  return $shop_name;
}

function getShopId($nom){
	$bdd = dbConnect();
	$shop_id = $bdd->prepare('SELECT `idPdLs` FROM `points_de_livraison` WHERE nom = ? ');
	$shop_id->execute(array($nom));
	return $shop_id;
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

function getPdls(){
	$bdd = dbConnect();
	$pdl = $bdd->query('SELECT * FROM `points_de_livraison`');
	return $pdl;
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

function getHisto() {
  $bdd= dbConnect();
  $query = $bdd->query('SELECT * FROM achats WHERE idClients="'.$_SESSION['id'].'"');
}

function updateClient($surname, $pseudo, $pdl, $id) {
	$bdd= dbConnect();
	$items = $bdd->prepare('UPDATE clients SET prenom=:surname, pseudo=:pseudo, idPdLs=:pdl WHERE idClients = :id');
	$items->execute(array(
		'surname' => $surname,
		'pseudo' => $pseudo,
		'pdl' => $pdl,
		'id' => $id
	));
}

function updateCredit($credit) {
  $bdd= dbConnect();
  $items = $bdd->prepare('UPDATE clients SET credit=:credit WHERE pseudo="'.$_SESSION['pseudo'].'"');
  $items->execute(array(
    'credit' => $credit
  ));
}

function historyCall() {
	$bdd = dbConnect();
	$items = $bdd->query('SELECT  `achats`.date AS "achats.date", `achats`.time AS "achats.time",
									`achats`.idArticles AS "achats.idArticles", `achats`.idClients AS "achats.idClients", 
									`achats`.etat AS "achats.etat", `achats`.quantite AS "achats.quantite", 
									`clients`.idClients AS "clients.idClients", `clients`.pseudo AS "clients.pseudo", 
									`articles`.idArticles AS "articles.idArticles", `articles`.nom AS "articles.nom" 
							FROM    achats, clients, articles 
							WHERE ( `achats`.idArticles=`articles`.idArticles 
							        AND `clients`.idClients=`achats`.idClients 
							        AND `achats`.etat!="Panier" 
									AND `clients`.pseudo="'.$_SESSION['pseudo'].'"
								) ORDER BY `achats`.date DESC, `achats`.time DESC'
						  ); 
	return $items;
}

function basketCall() {
  $bdd = dbConnect();
  $items = $bdd->query('SELECT  `achats`.date AS "achats.date", `achats`.time AS "achats.time",
                  `achats`.idArticles AS "achats.idArticles", `achats`.idClients AS "achats.idClients", 
                  `achats`.etat AS "achats.etat", `achats`.quantite AS "achats.quantite", 
                  `clients`.idClients AS "clients.idClients", `clients`.pseudo AS "clients.pseudo", 
                  `articles`.idArticles AS "articles.idArticles", `articles`.nom AS "articles.nom" 
              FROM    achats, clients, articles 
              WHERE ( `achats`.idArticles=`articles`.idArticles 
                      AND `clients`.idClients=`achats`.idClients 
                      AND `achats`.etat="Panier" 
                  AND `clients`.pseudo="'.$_SESSION['pseudo'].'"
                ) ORDER BY `achats`.date DESC, `achats`.time DESC'
              ); 
  return $items;
}

function updateStock($new_stock, $id) {
  $bdd= dbConnect();
  $items = $bdd->prepare('UPDATE articles SET quantite=:stock WHERE idArticles=:id');
  $items->execute(array(
    'stock' => $new_stock,
    'id' => $id
  ));
}

function supprItem($id) {
  $bdd= dbConnect();
  $items = $bdd->prepare('UPDATE articles SET quantite="0" WHERE idArticles=:id');
  $items->execute(array('id' => $id));
}

?>