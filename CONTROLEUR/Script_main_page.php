<?php
session_start();
$_SESSION['pseudo'] = $_POST['pseudo'];
include('../VUE/main_page.php');




