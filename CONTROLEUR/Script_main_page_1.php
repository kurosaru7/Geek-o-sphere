<?php
	$verif1=false;
	if (isset($_SESSION['articles']) && $_SESSION['articles'] != '') {   //Watch the first SELECT
		$part_1_query = ' categorie="'.$_SESSION['articles'].'"';
		$verif1=true;
	}

	$verif2=false;
	if (isset($_SESSION['categorie']) && $_SESSION['categorie'] != '') { //Watch the second SELECT
		$part_2_query = ' sous_categorie="'.$_SESSION['categorie'].'"';
		$verif2=true;
	}
	$query_sql=''; 
	if ($verif1 == true && $verif2 == true) {							 //Create the query with SELECTs
		$query_sql = 'WHERE ('.$part_1_query.' AND '.$part_2_query.')'; 
	} else if ($verif1 == true && $verif2 == false) {
		$query_sql = 'WHERE '.$part_1_query;
	} else if ($verif1 == false && $verif2 == true) {
		$query_sql = 'WHERE '.$part_2_query;
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

	$articles = getArticlesCustom($query_sql);
	while ( $data = $articles -> fetch()) { 							 //Print all lignes of the table

		print ('<tr>
				<td>'.utf8_encode($data['categorie']).'
				<td>'.utf8_encode($data['sous_categorie']).'
				<td>'.utf8_encode($data['nom']).'
				<td>'.utf8_encode($data['quantite']).'
				<td>'.utf8_encode($data['prix']).'€
				<td><select class="stock">');
			for ($i=0; $i < $data['quantite']; $i++) { 
				print('<option selected="stock">'.($i+1).'</option>');
			}
		print ('    </select>
				<td><button>Panier</button>'
		);

	}

?>
