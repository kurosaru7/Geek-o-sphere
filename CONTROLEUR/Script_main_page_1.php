<?php
	$verif1=false;
	if (isset($_SESSION['articles']) && $_SESSION['articles'] != '') {
		$partie_1_requete = ' categorie="'.$_SESSION['articles'].'"';
		$verif1=true;
	}

	$verif2=false;
	if (isset($_SESSION['categorie']) && $_SESSION['categorie'] != '') {
		$partie_2_requete = ' sous_categorie="'.$_SESSION['categorie'].'"';
		$verif2=true;
	}
	$requete_sql='';
	if ($verif1 == true && $verif2 == true) {
		$requete_sql = 'WHERE ('.$partie_1_requete.' AND '.$partie_2_requete.')';
	} else if ($verif1 == true && $verif2 == false) {
		$requete_sql = 'WHERE '.$partie_1_requete;
	} else if ($verif1 == false && $verif2 == true) {
		$requete_sql = 'WHERE '.$partie_2_requete;
	}

	print ('<tr>
			<th> Categorie 
			<th> Sous-Categorie
			<th> Nom
			<th> Quantité 
			<th> Prix 
			<th colspan="2">Commander			
		</tr> 
	');

	$articles = getArticlesCustom($requete_sql);
	while ( $donnees = $articles -> fetch()) {

		print ('<tr>
				<td>'.utf8_encode($donnees['categorie']).'
				<td>'.utf8_encode($donnees['sous_categorie']).'
				<td>'.utf8_encode($donnees['nom']).'
				<td>'.utf8_encode($donnees['quantite']).'
				<td>'.utf8_encode($donnees['prix']).'€
				<td><select class="stock">');
			for ($i=0; $i < $donnees['quantite']; $i++) { 
				print('<option selected="stock">'.($i+1).'</option>');
			}
		print ('    </select>
				<td><button>Panier</button>'
		);

	}
	//require('../VUE/main_page.php');

?>
