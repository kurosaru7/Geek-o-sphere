<?php
require("../MODEL/model.php");
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) {
  $query = 'WHERE `idArticles` ='.$_GET['id'];
  $_SESSION['id'] = $_GET['id'];
  $item = getArticlesCustom($query);

  $data = $item -> fetch();

  $categorie = utf8_encode($data['categorie']);
  $nom = utf8_encode($data['nom']);
  $description = utf8_encode($data['description']);
  $image =  utf8_encode($data['image']);
  $quantite = utf8_encode($data['quantite']);
  $prix =  utf8_encode($data['prix']);
  $sous_categorie = utf8_encode($data['sous_categorie']);

  include("../VIEW/detailed_item.php");
}else{
  include("../VIEW/authentification_requise.php");
}