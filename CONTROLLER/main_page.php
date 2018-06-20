<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
	include('../VIEW/main_page.php');
}else {
	include('../VIEW/verification_needed.php');
}