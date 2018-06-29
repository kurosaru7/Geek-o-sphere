<?php
session_start();

require('../MODEL/model.php');

$accounts = getAccounts(); //Call all accounts in DataBase
$pseudo_already_exist = false;

if(isset($_POST['pseudo'])) {

	while($data = $accounts->fetch()) {

		if($data['pseudo'] == $_POST['pseudo']) {
			$pseudo_already_exist = true;
		}
	}

	if($pseudo_already_exist) {
		$error = "<div class='alert2'>Ce pseudo existe déja !</div>";
	}else if(!empty($_POST['pseudo']) && !empty($_POST['pwd']) && !empty($_POST['f_name']) && !empty($_POST['s_name'])) { //Creation account

		if(strlen($_POST['pwd']) < 5) {
			$error = "<div class='alert2'>Votre mot de passe doit au moins contenir 5 caractères alphanumériques !</div>";
		}else if(strlen($_POST['pseudo']) < 6) {
				$error = "<div class='alert2'>Votre pseudo doit au moins contenir 6 caractères alphanumériques !</div>";
		}else {
			createAccount(utf8_decode($_POST['f_name']),utf8_decode($_POST['s_name']),utf8_decode($_POST['pseudo']),sha1($_POST['pwd']));
			 header('location:main_page.php');
			 $_SESSION['pseudo'] = $_POST['pseudo'];
			 $_SESSION['pwd'] = $_POST['pwd'];

			$error = '<br>Votre compte a été créé !';
		}
	}else {
		$error = "<div class='alert2'>Merci de remplir tous les champs</div>";
	}

}
require('../VIEW/account_creation.php');

?>
