<?php
session_start();

if(isset($_SESSION['pseudo']) && isset($_SESSION['pwd'])) { //Securise connection
  if(isset($_SESSION['informations_change']) && $_SESSION['informations_change']){
    $_SESSION['informations_change'] = false;
    $result="<br><div class='valide3'>Vos informations ont bien été modifiées.</div>";
	}else if (isset($_SESSION['error'])) {
    $result = $_SESSION['error'];
    $_SESSION['error'] = "";
  }
  include('../VIEW/modif_client.php');
}else {
	include('../VIEW/verification_needed.php');
}

?>