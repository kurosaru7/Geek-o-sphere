<html>
  <head>
    <title>Historiques</title>
    <link rel="stylesheet" href="../../VIEW/style.css">
    <meta charset="UTF-8">
  </head>
  <body>

    <h1>Gestion des comptes clients</h1><br>

    <?php require('./error.php') ?>

    <center>
      <form action="./modif.php" method="POST">
        <?php include('./change_account_1.php'); ?>
        <br>
        <input type="submit" class="modification" value="Sauvegarder">
      </form>
    </center>

   <a href="./account.php"><button class="button">Retour</button></a>
  </body>
</html>