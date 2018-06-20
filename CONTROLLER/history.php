<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
	include('../VIEW/history.php');
}else {
	include('../VIEW/authentification_requise.php');
}

?>