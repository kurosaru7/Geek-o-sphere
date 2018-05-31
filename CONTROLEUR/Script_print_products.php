<?php

require('../MODEL/model.php');
$products = getArticles();

while ($line = $products->fetch()) {
		echo "<u>".utf8_encode($line["nom"])."</u>&nbsp;", utf8_encode($line["quantite"])," produits actuellement en stock&nbsp<input type='number' name='restock'><br>";
}

?>