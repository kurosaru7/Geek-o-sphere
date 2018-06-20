<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
	include('../VIEW/customer_page.php');
}else {
	include('../VIEW/authentification_requise.php');
}

?>