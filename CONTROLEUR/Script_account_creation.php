<?php 

require('../MODEL/model.php');

$accounts = getAccounts();

if(isset($_POST['pseudo'])) {

	while($data = $accounts->fetch()) {

		if($data['pseudo'] == $_POST['pseudo']) {
			$pseudo_already_exist = true;
		}
	}

	if($pseudo_already_exist) {
		echo "Ce pseudo existe déja !";
	}else if(!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {

		if(strlen($_POST['mdp']) < 5) {
			echo 'Votre mot de passe doit au moins contenir 5 caractères !';
		}else {
			createAccount($_POST['nom'],$_POST['prenom'],$_POST['pseudo'],$_POST['mdp']);
			echo '<br>Your account has been created !';
		}
	}else {
		echo "Merci de remplir tous les champs";
	}

}
require('../VUE/account_creation.php');

?>

