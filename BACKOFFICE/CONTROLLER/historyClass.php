<?php
  session_start();
  require('../../MODEL/model.php');

  $_SESSION['clients'] = $_GET['client'];
  header('location: ./history.php');
?>