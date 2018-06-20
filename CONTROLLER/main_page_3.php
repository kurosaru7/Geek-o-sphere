<?php
	$option = 'sous_categorie';
	$query = getSelectDistinct($option);
	while ( $data = $query -> fetch()) { //Print SELECT

		echo '<option value="'.utf8_encode($data['sous_categorie']).'">'.utf8_encode($data['sous_categorie']).'</option>';
	}
?>