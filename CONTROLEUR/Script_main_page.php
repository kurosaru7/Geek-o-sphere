<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
	include('../VUE/main_page.php');
}else {
	include('../VUE/authentification_requise.php');
}




