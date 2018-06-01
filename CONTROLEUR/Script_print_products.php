<?php

require('../MODEL/model.php');
$items = getItems();

while ($line = $items->fetch()) {
		echo "<tr><td>".utf8_encode($line["nom"])."</td>&nbsp;","<td>".utf8_encode($line["quantite"])."</td>","<td><input type='number' name='restock'></td></tr>";
}

?>