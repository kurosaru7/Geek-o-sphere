<?php

require('../MODEL/model.php');

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['picture']) && !empty(is_numeric($_POST['quantity'])) && !empty(is_numeric($_POST['price'])) && ($_POST['class'] !== "") && ($_POST['subclass'] !== "") && ($_POST['idShop'] !== "")) {

	addItem(($_POST['class']),($_POST['name']),($_POST['description']),($_POST['picture']),($_POST['quantity']),($_POST['idShop']),($_POST['price']),($_POST['subclass']));

	header('location:../VUE/backoffice.php?item=added');
	echo "<h2 style='color: LimeGreen'>Le produit a bien été ajouté!</h2>";

} else {
	header('location:../VUE/backoffice.php?item=fail');
	echo "<h2 style='color: Red'>Tous les champs ne sont pas remplis!</h2>";
}
require('../VUE/Backoffice.php');

?>