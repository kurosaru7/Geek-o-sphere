<?php
require('../../MODEL/model.php');

$data_account = getOneAccount($_POST['pseud']);
$account = $data_account->fetch();

$data = getShopId($_POST['pdl']);
$id = $data -> fetch();

$accounts = getAccounts(); //Call all accounts in DataBase
$pseudo_already_exist = false;


if($_POST['pseudo'] == $_POST['pseud']){
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
  if(utf8_encode($pdl['nom']) == $_POST['pdl']) {
    $exist = true;
  }
}

if($_POST['pwd1'] == $_POST['pwd2']){
  $same = true;
}

if(!$exist){
  $error = "<h2 style='color: Red'>Merci de rentrer un point de livraison valide.</h2>";
  header("location:./change_account.php?error=".$error."&pseudo=".$_POST['pseudo']);
}

if(empty($_POST['pwd1'])){
    $empty = true;
}
if(!$same && !$empty){
  $error = "<h2 style='color: Red'>Les mots de passe ne correspondent pas.</h2>";
  header("location:./change_account.php?error=".$error."&pseudo=".$_POST['pseudo']);
}

 if($exist && $same){
  if(strlen($_POST['pseudo']) < 6) {
    $error = "<h2 style='color: Red'>Votre pseudo doit au moins contenir 6 caractères !</h2>";
    header("location:./change_account.php?error=".$error."&pseudo=".$_POST['pseudo']);
  }else if($pseudo_already_exist){
    $error = "<h2 style='color: Red'>Ce pseudo existe déja, merci d'en choisir un autre!</h2>";
    header("location:./change_account.php?error=".$error."&pseudo=".$_POST['pseudo']);
  }else if(strlen($_POST['pwd1']) < 5 && !$empty) {
    $error = "<h2 style='color: Red'>Votre mot de passe doit au moins contenir 5 caractères !</h2>";
    header("location:./change_account.php?error=".$error."&pseudo=".$_POST['pseudo']);
  }else{
    if($empty){
      $_POST['pwd1'] = $account['mdp'];
    }else{
      $_POST['pwd1'] = sha1($_POST['pwd1']);
    }
    updateClient(utf8_decode($_POST['nom']),utf8_decode($_POST['prenom']),utf8_decode($_POST['pseudo']),$id['idPdLs'],$account['idClients'],$_POST['pwd1']);
    header("location:./account.php");
  }
}