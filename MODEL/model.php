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

function getPdlName($idPdLs){
  $bdd = dbConnect();
  $shop_name = $bdd->prepare('SELECT nom,idPdLs FROM `points_de_livraison` WHERE idPdLs = ?');
  $shop_name->execute(array($idPdLs));
  return $shop_name;
}


function getAllPdl(){
  $bdd = dbConnect();
  $shop_name = $bdd->query('SELECT nom,idPdLs FROM `points_de_livraison` ');
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

function updateClient($name,$surname, $pseudo, $pdl, $id,$pwd) {
	$bdd= dbConnect();
	$items = $bdd->prepare('UPDATE clients SET nom=:name, prenom=:surname, pseudo=:pseudo, idPdLs=:pdl, mdp=:pwd WHERE idClients = :id');
	$items->execute(array(
    'pwd' => $pwd,
    'name' => $name,
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
									`articles`.idArticles AS "articles.idArticles", `articles`.nom AS "articles.nom",
                  `points_de_livraison`.nom AS "points_de_livraison.nom"
							FROM    achats, clients, articles, points_de_livraison
							WHERE ( `points_de_livraison`.idPdLs=`achats`.idMagasins AND `achats`.idArticles=`articles`.idArticles
							        AND `clients`.idClients=`achats`.idClients
							        AND `achats`.etat!="Panier"
									AND `clients`.pseudo="'.$_SESSION['pseudo'].'"
								) ORDER BY `achats`.date DESC, `achats`.time DESC'
						  );
	return $items;
}

function basketCall() {
  $bdd = dbConnect();
  $items = $bdd->query('SELECT  `achats`.idAchats AS "achats.id", `achats`.date AS "achats.date", `achats`.time AS "achats.time",
                  `achats`.idArticles AS "achats.idArticles", `achats`.idClients AS "achats.idClients",
                  `achats`.etat AS "achats.etat", `achats`.quantite AS "achats.quantite",
                  `clients`.idClients AS "clients.idClients", `clients`.pseudo AS "clients.pseudo",
                  `articles`.idArticles AS "articles.idArticles", `articles`.nom AS "articles.nom", `achats`.idAchats AS "achats.idAchats", `articles`.quantite AS "articles.quantite"
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

function addBasket($idclient,$idArticle,$quantite){
  $bdd= dbConnect();
    $add = $bdd->prepare('INSERT INTO achats(etat, date, time, idClients, idArticles, quantite) values (:etat, :date, :time, :idclient, :idArticle, :quantite)');
    $add->execute(array(
      'etat' => 'Panier',
      'date' => date('Y/m/d'),
      'time' => strftime("%H:%M:%S"),
      'idclient' => $idclient,
      'idArticle' =>$idArticle,
      'quantite' => $quantite
    ));
}

function removeBasket($idAchats) {
  $bdd = dbConnect();
  $rm = $bdd->prepare('DELETE FROM achats WHERE idAchats=:idachat');
  $rm->execute(array('idachat' => $idAchats));
}

function modifBasket($id,$quantite){
  $bdd=dbConnect();
  $modif=$bdd->prepare('UPDATE achats SET quantite=:quantite WHERE idArticles=:idarticle');
  $modif->execute(array(
    'idarticle' => $id,
    'quantite' => $quantite
  ));
}

function historySelect($cond) {
  $bdd= dbConnect();
  $add = $bdd->prepare('SELECT  `achats`.date AS "achats.date", `achats`.time AS "achats.time",
                  `achats`.idArticles AS "achats.idArticles", `achats`.idClients AS "achats.idClients",
                  `achats`.etat AS "achats.etat", `achats`.quantite AS "achats.quantite",
                  `clients`.idClients AS "clients.idClients", `clients`.pseudo AS "clients.pseudo",
                  `articles`.idArticles AS "articles.idArticles", `articles`.nom AS "articles.nom", `achats`.idAchats AS "achats.idAchats"
              FROM    achats, clients, articles
              WHERE ( `achats`.idArticles=`articles`.idArticles
                      AND `clients`.idClients=`achats`.idClients
                      AND `achats`.etat!="Panier" '.$cond.' ) ORDER BY `achats`.date DESC, `achats`.time DESC');
  $add->execute(array(
    'id' => $_SESSION['id']
  ));

  return $add;

}

function historyAll($cond) {
  $bdd= dbConnect();
  $add = $bdd->query('SELECT  `achats`.date AS "achats.date", `achats`.time AS "achats.time",
                  `achats`.idArticles AS "achats.idArticles", `achats`.idClients AS "achats.idClients",
                  `achats`.etat AS "achats.etat", `achats`.quantite AS "achats.quantite",
                  `clients`.idClients AS "clients.idClients", `clients`.pseudo AS "clients.pseudo",
                  `articles`.idArticles AS "articles.idArticles", `articles`.nom AS "articles.nom", `achats`.idAchats AS "achats.idAchats"
              FROM    achats, clients, articles
              WHERE ( `achats`.idArticles=`articles`.idArticles
                      AND `clients`.idClients=`achats`.idClients
                      AND `achats`.etat!="Panier" '.$cond.' ) ORDER BY `achats`.date DESC, `achats`.time DESC');

  return $add;

}

function supprAccount($id) {
  $bdd= dbConnect();

  $query = $bdd->prepare('DELETE FROM achats WHERE idClients=:id');
  $query->execute(array(
    'id' => $id
  ));

  $query = $bdd->prepare('DELETE FROM clients WHERE idClients=:id');
  $query->execute(array(
    'id' => $id
  ));
}

function paymentCall() {
  $bdd = dbConnect();
  $items = $bdd->query('SELECT  `articles`.nom AS "articles.nom",
                                `articles`.prix AS "articles.prix",
                                `achats`.idAchats AS "achats.idAchats",
                                `articles`.quantite AS "articles.quantite",
                                `achats`.quantite AS "achats.quantite",
                                `clients`.credit AS "clients.credit"
                        FROM    achats, clients, articles
                        WHERE ( `achats`.idArticles=`articles`.idArticles
                            AND `clients`.idClients=`achats`.idClients
                            AND `achats`.etat="Panier"
                            AND `clients`.pseudo="'.$_SESSION['pseudo'].'"
                      ) ORDER BY `achats`.date DESC, `achats`.time DESC'
              );
  return $items;
}

function buy ($nameArticles, $idAchats, $qAchats, $idPdLs) {
  $bdd = dbConnect();

  $query = $bdd->prepare('UPDATE articles SET quantite=:qAchats WHERE nom=:name');
  $query->execute(array(
    'qAchats' => $qAchats,
    'name' => $nameArticles
  ));

  $query = $bdd->prepare('UPDATE achats SET etat="En cours", idMagasins=:idPdLs WHERE idAchats=:id');
  $query->execute(array(
    'idPdLs' => $idPdLs,
    'id' => $idAchats
  ));
}

function emptyWallet ($count) {
  $bdd = dbConnect();

  $query = $bdd->prepare('UPDATE clients SET credit=:count WHERE pseudo=:pseudo');
  $query->execute(array(
    'count' => $count,
    'pseudo' => $_SESSION['pseudo']
  ));
}

function validDelivery ($idAchats) {
  $bdd = dbConnect();

  $rm = $bdd->prepare('UPDATE achats SET etat=:etat WHERE idAchats=:idachat');
  $rm->execute(array(
    'etat' => utf8_decode("Livré"),
    'idachat' => $idAchats
  ));
}

?>