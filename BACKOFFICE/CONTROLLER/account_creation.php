<?php
require('../../MODEL/model.php');

$accounts = getAccounts(); //Call all accounts in DataBase
$pseudo_already_exist = false;
$test = false;

if(isset($_POST['pseudo'])) {

	while($data = $accounts->fetch()) {

		if($data['pseudo'] == $_POST['pseudo']) {
			$pseudo_already_exist = true;
		}
	}

	if($pseudo_already_exist) {
		$error = "<h2 style='color: Red'>Ce pseudo existe déja !</h2>";
		$test = true;
	}else if(!empty($_POST['pseudo']) && !empty($_POST['pwd']) && !empty($_POST['f_name']) && !empty($_POST['s_name'])) { //Creation account

		if(strlen($_POST['pwd']) < 5) {
			$error = "<h2 style='color: Red'>Votre mot de passe doit au moins contenir 5 caractères !</h2>";
			$test = true;
		}else if(strlen($_POST['pseudo']) < 6) {
				$error = "<h2 style='color: Red'>Votre pseudo doit au moins contenir 6 caractères !</h2>";
				$test = true;
		}else {
			createAccount(utf8_decode($_POST['f_name']),utf8_decode($_POST['s_name']),utf8_decode($_POST['pseudo']),sha1($_POST['pwd']));
			 header('location:main_page.php');
			 $_SESSION['pseudo'] = $_POST['pseudo'];
			 $_SESSION['pwd'] = $_POST['pwd'];

			$error = "<h2 style='color: LimeGreen'>Votre compte a été créé !</h2>";
		}
	}else {
		$error = "<h2 style='color: Red'>Merci de remplir tous les champs</h2>";
		$test = true;
	}

}
if ($test == true) {

	header('location: ./new_account.php?error='.$error);

} else if ($test == false) {

	header('location: ./account.php?error='.$error);
}
?>
