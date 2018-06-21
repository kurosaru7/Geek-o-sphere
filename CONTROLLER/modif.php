<?php
session_start();
require('../MODEL/model.php');

$_SESSION['informations_change'] = false;

$data_account = getOneAccount($_SESSION['pseudo']);
$account = $data_account->fetch();

$data = getShopId($_POST['pdl']);
$id = $data -> fetch();

$data_pdls = getPdls();
while($pdl = $data_pdls->fetch()) {
  if($pdl['nom'] == $_POST['pdl']) {
    $exist = true;
  }
}

if($exist){
  updateClient($_POST['prenom'],$_POST['pseudo'],$id['idPdLs'],$account['idClients']);
  $_SESSION['pseudo'] = $_POST['pseudo'];
  $_SESSION['informations_change'] = true;
  header("location:./modify_client.php");
}else{
  $_SESSION['error'] = "<div class='error'>Merci de rentrer un point de livraison valide.</div>";
  header("location:./modify_client.php");
  }