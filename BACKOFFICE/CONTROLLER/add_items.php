<?php
session_start();

require('../../MODEL/model.php');

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['picture']) && !empty(is_numeric($_POST['quantity'])) && !empty(is_numeric($_POST['price'])) && ($_POST['class'] !== "") && ($_POST['subclass'] !== "") && ($_POST['idShop'] !== "")) {

	addItem(($_POST['class']),($_POST['name']),($_POST['description']),($_POST['picture']),($_POST['quantity']),($_POST['idShop']),($_POST['price']),($_POST['subclass']));

	$ok = "<h2 style='color: LimeGreen'>Le produit a bien été ajouté!</h2>";
	
} else {

	$fail = "<h2 style='color: Red'>Tous les champs ne sont pas remplis!</h2>";
}
require('../VIEW/Backoffice.php');

?>