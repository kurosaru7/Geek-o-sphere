<?php
session_start(); // End of the session.
session_destroy();

header('location:../index.php');


