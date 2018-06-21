<?php

require('../../MODEL/model.php');

$error = "L'article a été supprimé !";
supprItem($_POST['id']);
header('location: ../CONTROLLER/restocking.php?error='.$error);

?>