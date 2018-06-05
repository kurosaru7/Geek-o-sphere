<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
	include('../VUE/client_page.php');
}else {
	include('../VUE/authentification_requise.php');
}

?>