<?php

require('../../MODEL/model.php');
$items = getItems();

$test=false;
while ($line = $items->fetch()) {
	if ($line['idArticles'] == $_POST['id']) {
		if($_POST['symbole'] == "+" && ($line['quantite'] + $_POST['restock']) <= 100000){
			$new_stock = $line['quantite'] + $_POST['restock'];
			$test=true;
			$error="Le stock de l'article a été augmenté !";
			updateStock($new_stock, $_POST['id']);
		} else if($_POST['symbole'] == "-" && ($line['quantite'] - $_POST['restock']) >= 0){
			$new_stock = $line['quantite'] - $_POST['restock'];
			$test=true;
			$error="Le stock de l'article a été diminué !";
			updateStock($new_stock, $_POST['id']);
		}
	}
	if ($test == false) {
		$error="Opération incorrect !";
	}
}

header('location: ../CONTROLLER/restocking.php?error='.$error);

?>