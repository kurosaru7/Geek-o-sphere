<?php

session_start();
require("../MODEL/model.php");

$account = getOneAccount($_SESSION['pseudo']);
$data = $account -> fetch();

addBasket($data['idClients'],$_POST['id'],$_POST['quantite']);

header("location:./main_page.php");