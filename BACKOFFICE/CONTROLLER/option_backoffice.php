<?php

	$option = 'categorie';
	$query = getSelectDistinct($option);
	while ( $data = $query -> fetch()) { //Print SELECT

		echo '<option value="'.utf8_encode($data['categorie']).'">'.utf8_encode($data['categorie']).'</option>';
	}
?>