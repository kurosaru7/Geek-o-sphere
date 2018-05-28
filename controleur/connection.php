<?php
require('../modele/model.php');

$accounts = getAccounts();

while($data = $accounts->fetch()) {
	if(!empty($_GET['pseudo']) || !empty($_GET['mdp'])){

		if($_GET['pseudo'] == $data['pseudo'] && $_GET['mdp'] == $data['mdp']) {
			header('location:main_page.php');
		}else {
			$not_valid_info = true;

		}

	}
}

if($not_valid_info) {
	echo ' Not valid information';
}
require('../vue/connection_vue.php');
