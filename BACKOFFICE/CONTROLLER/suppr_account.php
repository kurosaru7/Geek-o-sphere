<?php
require('../../MODEL/model.php');

$error = "<h2 style='color: LimeGreen'>Le compte a été supprimé !";
supprAccount($_GET['id']);
header('location: ../CONTROLLER/account.php?error='.$error);
?>