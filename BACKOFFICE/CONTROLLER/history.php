<?php
session_start();

if (!isset($_SESSION['id'])) {

  $_SESSION['id'] = "";
}

if (!isset($_SESSION['clients'])) {

  $_SESSION['clients'] = "";
}

require('../../MODEL/model.php');
include('../VIEW/history.php');

?>