<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
	include('../VIEW/modif_client.php');
}else {
	include('../VIEW/authentification_requise.php');
}

?>