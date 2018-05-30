<?php
	require('../MODEL/model.php');

	$a=false;
	if (isset($_SESSION['articles']) && $_SESSION['articles'] != '') {
		$partie_1_requete = ' categorie="'.$_SESSION['articles'].'"';
		$a=true;
	}

	$b=false;
	if (isset($_SESSION['categorie']) && $_SESSION['categorie'] != '') {
		$partie_2_requete = ' sous_categorie="'.$_SESSION['categorie'].'"';
		$b=true;
	}
	$requete_sql='';
	if ($a == true && $b == true) {
		$requete_sql = 'WHERE ('.$partie_1_requete.' AND '.$partie_2_requete.')';
	} else if ($a == true && $b == false) {
		$requete_sql = 'WHERE '.$partie_1_requete;
	} else if ($a == false && $b == true) {
		$requete_sql = 'WHERE '.$partie_2_requete;
	}

	print ('<tr>
			<td> Categorie 
			<td> Sous-Categorie
			<td> Nom
			<td> Quantité 
			<td> Prix 			 
	');

	$articles = getArticlesCustom($requete_sql);
	while ( $donnees = $articles -> fetch()) {

		print ('<tr>
				<td>'.utf8_encode($donnees['categorie']).'
				<td>'.utf8_encode($donnees['sous_categorie']).'
				<td>'.utf8_encode($donnees['nom']).'
				<td>'.utf8_encode($donnees['quantite']).'
				<td>'.utf8_encode($donnees['prix']).'€'
		);

	}
	//require('../VUE/main_page.php');

?>
