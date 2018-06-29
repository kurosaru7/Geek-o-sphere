<html>
  <head>
    <title>Historiques</title>
    <link rel="stylesheet" href="../../VIEW/style.css">
    <meta charset="UTF-8">
  </head>
  <body>

    <h1>Historique des achats</h1><br>

    <center>
      <form action="./historyClass.php" method="get">  
        <select name="client">
          <option value="">Tout les clients</option>
          <?php include('./history_2.php'); ?>
        </select>
        <button class="button">Chercher</button>
      </form>
    </center>

    <br><br>

    <?php include('./history_1.php'); ?>

  <a href="./home.php"><button class="button">Retour</button></a>
</body>
</html>