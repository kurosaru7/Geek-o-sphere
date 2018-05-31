<?php 
session_start();

require('../MODEL/model.php');

$accounts = getAccounts();

if(isset($_POST['pseudo'])) {

	while($data = $accounts->fetch()) {

		if($data['pseudo'] == $_POST['pseudo']) {
			$pseudo_already_exist = true;
		}
	}

	if($pseudo_already_exist) {
		$erreur = "<div class='alert2'>Ce pseudo existe déja !</div>";
	}else if(!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {

		if(strlen($_POST['mdp']) < 5) {
			$erreur = "<div class='alert2'>Votre mot de passe doit au moins contenir 5 caractères !</div>";
		}else if(strlen($_POST['pseudo']) < 6) {
				$erreur = "<div class='alert2'>Votre pseudo doit au moins contenir 6 caractères !</div>";
		}else {
			createAccount($_POST['nom'],$_POST['prenom'],$_POST['pseudo'],sha1($_POST['mdp']));
			 header('location:Script_main_page.php');
			 $_SESSION['pseudo'] = $_POST['pseudo'];
			 $_SESSION['mdp'] = $_POST['mdp'];

			$erreur = '<br>Your account has been created !';
		}
	}else {
		$erreur = "<div class='alert2'>Merci de remplir tous les champs</div>";
	}

}
require('../VUE/account_creation.php');

?>
