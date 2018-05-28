<?php
require('../MODEL/model.php');

$accounts = getAccounts();
$not_valid_info = false;

while($data = $accounts->fetch()) {
	if(!empty($_GET['pseudo']) || !empty($_GET['mdp'])){

		if($_GET['pseudo'] == $data['pseudo'] && $_GET['mdp'] == $data['mdp']) {
			header('location:Script_main_page_1.php');
		}else {
			$not_valid_info = true;

		}

	}
}

if($not_valid_info) {
	echo ' Not valid information';
}
require('../VUE/connection.php');
?>