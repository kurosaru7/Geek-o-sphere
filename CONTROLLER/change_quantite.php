<?php
session_start();

include('../MODEL/model.php');

modifBasket($_POST['id'],$_POST['quantite_u']);

header('location:./basket.php');