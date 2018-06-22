<?php require("../MODEL/model.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
    <meta charset ="UTF-8">
</head>
<body><br>
        <center>
        <img src="../VIEW/logo.png" class ="image" />
            <?php include('./navigation_bar.php'); ?>
            <table>
                  <?php include('./customer_page_1.php'); ?>
              </table>
        </center>
        <br>

        <a href="./history.php">
            <button class="connection_custom">Voir l'Historique</button>
        </a><br><br>

    <a  href="./modify_client.php">
            <button class="modification_custom">Changer ses Coordonnées</button>
    </a>
    </body>
</html>