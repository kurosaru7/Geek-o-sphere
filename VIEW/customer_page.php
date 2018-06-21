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
            <button class="button">Voir l'Historique</button>
        </a>

    <div class="test">
    <a  href="./modify_client.php">
            <button class="change">Changer ses Coordonnées</button>
    </a>
  </div>
    </body>
</html>