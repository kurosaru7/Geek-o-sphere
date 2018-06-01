<?php

require('../MODEL/model.php');
$items = getItems();

while ($line = $products->fetch()) {
	$line['quantite'] = $line['quantite'] + $_POST['restock'];
}

require('../VUE/restocking.php');

?>