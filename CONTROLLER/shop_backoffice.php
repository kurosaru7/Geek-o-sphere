<?php

	$idShop = getShops();
	while ($data = $idShop -> fetch()) { //Print SELECT

		echo '<option value="'.utf8_encode($data['idMagasins']).'">'.utf8_encode($data['nom']).'</option>';
	}

?>