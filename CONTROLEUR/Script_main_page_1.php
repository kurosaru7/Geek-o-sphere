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

	$verif3=false;
	if (isset($_SESSION['order']) && $_SESSION['order'] != '') { //Watch the second SELECT
		$part_3_query = ' ORDER BY '.$_SESSION['order'];
		$verif3=true;
	}

	$query_sql=''; 
	if ($verif1 == true && $verif2 == true && $verif3 == false) {							 //Create the query with SELECTs
		$query_sql = 'WHERE ('.$part_1_query.' AND '.$part_2_query.')'; 
	} else if ($verif1 == true  && $verif2 == false && $verif3 == false) {
		$query_sql = 'WHERE '.$part_1_query;
	} else if ($verif1 == false && $verif2 == true  && $verif3 == false) {
		$query_sql = 'WHERE '.$part_2_query;
	} else if ($verif1 == true  && $verif2 == true  && $verif3 == true) {
		$query_sql = 'WHERE ('.$part_1_query.' AND '.$part_2_query.')'.$part_3_query; 
	} else if ($verif1 == true  && $verif2 == false && $verif3 == true) {
		$query_sql = 'WHERE '.$part_1_query.$part_3_query;
	} else if ($verif1 == false && $verif2 == true  && $verif3 == true) {
		$query_sql = 'WHERE '.$part_2_query.$part_3_query;
	} else if ($verif1 == false && $verif2 == false  && $verif3 == true) {
		$query_sql = $part_3_query;
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

	$test = false;
	$articles = getArticlesCustom($query_sql);
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
	}

?>
