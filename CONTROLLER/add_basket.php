<?php

session_start();
require("../MODEL/model.php");

$account = getOneAccount($_SESSION['pseudo']); // Recovery of client account.
$data = $account -> fetch();


$query = basketCall(); // Call of all items the client want to buy.
$basket = $query->fetch();

if($_POST['id'] != $basket['achats.idArticles']){ // Search if client had already tried to put the item.
  addBasket($data['idClients'],$_POST['id'],$_POST['quantite']); // Then, update the item in the order.
}else{
  modifBasket($_POST['id'],$_POST['quantite']); // Else, add the item.
}

header("location:./main_page.php");