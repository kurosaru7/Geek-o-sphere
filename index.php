<?php
session_start();

require('MODEL/model.php');

$accounts = getAccounts();
$not_valid_info = false;

while($data = $accounts->fetch()) {
	if(!empty($_POST['pseudo']) || !empty($_POST['pwd'])){

		if($_POST['pseudo'] == $data['pseudo'] && sha1($_POST['pwd']) == $data['mdp']) {
			header('location:CONTROLEUR/Script_main_page.php');
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['pwd'] = $_POST['pwd'];
		}else {
			$not_valid_info = "<div class='alert'>Ce compte n'existe pas.</div>";

		}

	}
}
require('VUE/connection.php');
?>
