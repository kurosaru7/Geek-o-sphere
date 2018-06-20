<?php

require('../../MODEL/model.php');
$items = getItems();

while ($line = $items->fetch()) {
	if($_POST['symbole'] = "+"){
		$new_stock = $line['quantite'] + $_POST['restock'];
	} else if($_POST['symbole'] = "-"){
		$new_stock = $line['quantite'] - $_POST['restock'];
	}
}

updateStock($new_stock);
header('location: ../VIEW/restocking.php');


?>