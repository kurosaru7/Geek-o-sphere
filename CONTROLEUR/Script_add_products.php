<?php

require('../MODEL/model.php');

if(!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['image']) && !empty(is_numeric($_POST['quantite'])) && !empty(is_numeric($_POST['prix'])) && ($_POST['categorie'] !== "Catégorie") && ($_POST['sous_categorie'] !== "Sous-Catégorie") && ($_POST['idMagasins'] !== "Magasins")) {

	addArticle(($_POST['categorie']),($_POST['nom']),($_POST['description']),($_POST['image']),($_POST['quantite']),($_POST['idMagasins']),($_POST['prix']),($_POST['sous_categorie']));

	echo "Le produit a bien été ajouté";

} else {
	echo "Tous les champs ne sont pas remplis<br>";
}
require('../VUE/Backoffice.php');

?>