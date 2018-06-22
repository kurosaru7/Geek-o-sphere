<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
  if($_SESSION['informations_change']){
    $_SESSION['informations_change'] = false;
    $result="<div class='valide'>Vos informations ont bien été modifiées.</div>";
	}else{
    $result = $_SESSION['error'];
    $_SESSION['error'] = "";
  }
  include('../VIEW/modif_client.php');
  $error = $_SESSION['error'];
}else {
	include('../VIEW/verification_needed.php');
}

?>