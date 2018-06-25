<?php

session_start();
require("../MODEL/model.php");

removeBasket($_GET['id']);

header("location:./basket.php");