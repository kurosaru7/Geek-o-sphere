<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) {
	require("../MODEL/model.php");
	$query = 'WHERE `idArticles` ='.$_GET['id'];
	$articles = getArticlesCustom($query);

	$data = $articles -> fetch();

	$categorie = utf8_encode($data['categorie']);
	$nom = utf8_encode($data['nom']);
	$description = utf8_encode($data['description']);
	$image =  utf8_encode($data['image']);
	$quantite = utf8_encode($data['quantite']);
	$prix =  utf8_encode($data['prix']);
	$sous_categorie = utf8_encode($data['sous_categorie']);
		
	include("../VUE/detail_article.php");
}else{
	include("../VUE/authentification_requise.php");
}
