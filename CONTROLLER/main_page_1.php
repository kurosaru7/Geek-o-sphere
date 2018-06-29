<?php
	$verif1=false;
	if (isset($_SESSION['articles']) && $_SESSION['articles'] != '') {   //Watch the first SELECT
		$part_1_query = ' categorie="'.utf8_decode($_SESSION['articles']).'"';
		$verif1=true;
	}

	$verif2=false;
	if (isset($_SESSION['categorie']) && $_SESSION['categorie'] != '') { //Watch the second SELECT
		$part_2_query = ' sous_categorie="'.utf8_decode($_SESSION['categorie']).'"';
		$verif2=true;
	}

	$verif3=false;
	if (isset($_SESSION['order']) && $_SESSION['order'] != '') { //Watch the second SELECT
		$part_3_query = ' ORDER BY '.$_SESSION['order'];
		$verif3=true;
	}

	$query_sql='WHERE quantite!="0"';
	if ($verif1 == true && $verif2 == true && $verif3 == false) {							 //Create the query with SELECTs
		$query_sql = 'WHERE ('.$part_1_query.' AND '.$part_2_query.' AND quantite!="0")';
	} else if ($verif1 == true  && $verif2 == false && $verif3 == false) {
		$query_sql = 'WHERE ('.$part_1_query.' AND quantite!="0")';
	} else if ($verif1 == false && $verif2 == true  && $verif3 == false) {
		$query_sql = 'WHERE ('.$part_2_query.' AND quantite!="0")';
	} else if ($verif1 == true  && $verif2 == true  && $verif3 == true) {
		$query_sql = 'WHERE ('.$part_1_query.' AND '.$part_2_query.' AND quantite!="0")'.$part_3_query;
	} else if ($verif1 == true  && $verif2 == false && $verif3 == true) {
		$query_sql = 'WHERE ('.$part_1_query.' AND quantite!="0") '.$part_3_query;
	} else if ($verif1 == false && $verif2 == true  && $verif3 == true) {
		$query_sql = 'WHERE ('.$part_2_query.' AND quantite!="0") '.$part_3_query;
	} else if ($verif1 == false && $verif2 == false  && $verif3 == true) {
		$query_sql = 'WHERE quantite!="0" '.$part_3_query;
	}


	$test = false;
	$articles = getArticlesCustom($query_sql);
	$test_recherche = false;
	while ( $data = $articles -> fetch()) { //Print all lignes of the table

		$temp = explode(" ", $data['nom']);
		$temp2 = explode(" ", $data['categorie']);
		$temp3 = explode(" ", $data['sous_categorie']);
		$test = false;

		if (isset($_SESSION['chain']) && $_SESSION['chain'] != "") {
			for ($i=0; $i < sizeof($_SESSION['chain']); $i++) {
				if ($test == false) {
					for ($j=0; $j < sizeof($temp); $j++) {
						if (strtolower($_SESSION['chain'][$i]) == strtolower(utf8_encode($temp[$j]))) {
							$test = true;
						}
					}
				} if ($test == false) {
					for ($j=0; $j < sizeof($temp2); $j++) {
						if (strtolower($_SESSION['chain'][$i]) == strtolower(utf8_encode($temp2[$j]))) {
							$test = true;
						}
					}
				} if ($test == false) {
					for ($j=0; $j < sizeof($temp3); $j++) {
						if (strtolower($_SESSION['chain'][$i]) == strtolower(utf8_encode($temp3[$j]))) {
							$test = true;
						}
					}
				}
			}
		}
		if ($test == true || isset($_SESSION['chain']) == false || $_SESSION['chain'] == "") {
			$test_recherche = true;
			print ('<tr>
					<td><a href="detailed_item.php?id='.$data['idArticles'].'"><img src =../VIEW/image_sql/'.utf8_encode($data['image']).' class="image_custom"></a>
					<td><div class="lien"><a href="detailed_item.php?id='.$data['idArticles'].'">'.utf8_encode($data['nom']).'</a></div>
					<td>'.utf8_encode($data['categorie']).' /
				 '.utf8_encode($data['sous_categorie']).'
					<td>'.utf8_encode($data['quantite']).' en stock
					<td>Prix : '.utf8_encode($data['prix']).'€
				');
			print ('    </select>'
			);
		}
	}
	if ($test_recherche == false) {
		print('<tr><td><td><td colspan="4">Aucun article ne correspond à votre recherche.</td>');
	}

?>
