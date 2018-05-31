<?php
	$option = 'sous_categorie';
	$requete = getSelectDistinct($option);
	while ( $donnees = $requete -> fetch()) {

		echo '<option value="'.$donnees['sous_categorie'].'">'.$donnees['sous_categorie'].'</option>';
		
	}
?>
