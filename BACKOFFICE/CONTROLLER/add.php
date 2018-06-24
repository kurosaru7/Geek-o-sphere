<?php
require('../../MODEL/model.php');

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['picture']) && !empty(is_numeric($_POST['quantity'])) && !empty(is_numeric($_POST['price'])) && ($_POST['class'] !== "") && ($_POST['subclass'] !== "") && ($_POST['idShop'] !== "")) {

  addItem(($_POST['class']),($_POST['name']),($_POST['description']),($_POST['picture']),($_POST['quantity']),($_POST['idShop']),($_POST['price']),($_POST['subclass']));

  $error = "<h2 style='color: Red'>Le produit a bien été ajouté!";

} else {

  $error = "<h2 style='color: Red'>Tous les champs ne sont pas remplis!";
}
header('location: ../CONTROLLER/add_item.php?error='.$error);

?>