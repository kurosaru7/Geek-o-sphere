<?php
session_start();
require('../MODEL/model.php');

$_SESSION['informations_change'] = false;
$_SESSION['error'] = "";


$data_account = getOneAccount($_SESSION['pseudo']);
$account = $data_account->fetch();

$data = getShopId($_POST['pdl']);
$id = $data -> fetch();

$accounts = getAccounts(); // Call all accounts in DataBase
$pseudo_already_exist = false;


if($_POST['pseudo'] == $_SESSION['pseudo']){
      $pseudo_already_exist = false;
}else{
  while($data_pseudo = $accounts->fetch()) {

      if($data_pseudo['pseudo'] == $_POST['pseudo']) {
        $pseudo_already_exist = true;
      }
    }
}

$data_pdls = getPdls();
while($pdl = $data_pdls->fetch()) {
  if($pdl['nom'] == $_POST['pdl']) {
    $exist = true;
  }
}

if($_POST['pwd1'] == $_POST['pwd2']){
  $same = true;
}

if(!$exist){
  $_SESSION['error'] = "<div class='error'>Merci de rentrer un point de livraison valide.</div>";
  header("location:./modify_client.php");
}

if(empty($_POST['pwd1'])){
    $empty = true;
}
if(!$true && !$empty){
  $_SESSION['error'] = "<div class='error'>Les mots de passe ne correspondent pas.</div>";
  header("location:./modify_client.php");
}

 if($exist && $same){
  if(strlen($_POST['pseudo']) < 6) {
    $_SESSION['error'] = "<div class='error'>Votre pseudo doit au moins contenir 6 caractères alphanumériques !</div>";
    header("location:./modify_client.php");
  }else if($pseudo_already_exist){
    $_SESSION['error'] = "<div class='error'>Ce pseudo existe déja, merci d'en choisir un autre!</div>";
    header("location:./modify_client.php");
  }else if(strlen($_POST['pwd1']) < 5 && !$empty) {
    $_SESSION['error'] = "<div class='error'>Votre mot de passe doit au moins contenir 5 caractères alphanumériques !</div>";
    header("location:./modify_client.php");
  }else{
    if($empty){
      $_POST['pwd1'] = $account['mdp'];
    }else{
      $_POST['pwd1'] = sha1($_POST['pwd1']);
    }
    updateClient(utf8_decode($_POST['nom']),utf8_decode($_POST['prenom']),utf8_decode($_POST['pseudo']),$id['idPdLs'],$account['idClients'],$_POST['pwd1']);
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['informations_change'] = true;
    header("location:./modify_client.php");
  }
}