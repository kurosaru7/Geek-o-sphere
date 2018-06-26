<?php
require('../../MODEL/model.php');

$error = "<h2 style='color: LimeGreen'>L'article a été supprimé !";
supprItem($_POST['id']);
header('location: ../CONTROLLER/restocking.php?error='.$error);
?>