<?php
	$option = 'categorie';
	$requete = getSelectDistinct($option);
	while ( $donnees = $requete -> fetch()) {

		echo '<option value="'.$donnees['categorie'].'">'.$donnees['categorie'].'</option>';
	
	}
?>