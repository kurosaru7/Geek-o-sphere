<?php

session_start();
require("../MODEL/model.php");

$account = getOneAccount($_SESSION['pseudo']);
$data = $account -> fetch();


$query = basketCall();
$basket = $query->fetch();

if($_POST['id'] != $basket['achats.idArticles']){
  addBasket($data['idClients'],$_POST['id'],$_POST['quantite']);
}else{
  modifBasket($_POST['id'],$_POST['quantite']);
}

header("location:./main_page.php");