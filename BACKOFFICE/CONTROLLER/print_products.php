<?php

$items = getItems();

while ($line = $items->fetch()) {
		   echo	"<form action ='../CONTROLLER/manage_stock.php' method='POST'>
					<tr>
					<td>".utf8_encode($line["nom"])."</td>&nbsp
					<td>".utf8_encode($line["quantite"])."</td>
					<td><select name='symbole'>
						<option value='+'>+</option>
						<option value='-'>-</option>
					</select></td>
					<input type='hidden' name='id' value='".$line["idArticles"]."'>
					<td><input type='number' name='restock'></td>
					<td><button>Modifier</button></td>
				</form>
				<form action ='../CONTROLLER/suppr.php' method='POST'>
					<td><button>Supprimer</button></td></tr>
					<input type='hidden' name='id' value='".$line["idArticles"]."'>
				</form>";
}

?>