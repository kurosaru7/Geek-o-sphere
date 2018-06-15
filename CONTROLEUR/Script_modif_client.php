<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
	include('../VUE/modif_client.php');
}else {
	include('../VUE/authentification_requise.php');
}

?>