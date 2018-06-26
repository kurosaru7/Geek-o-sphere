<html>
  <head>
    <title>Historiques</title>
    <link rel="stylesheet" href="../../VIEW/style.css">
    <meta charset="UTF-8">
  </head>
  <body>

    <h1>Gestion des comptes clients</h1><br>

    <?php require('./error.php') ?>

    <?php require('./account_1.php') ?><br><br>

    <center>
    	<form action="./new_account.php" method="get">
    		<button class="button">Créer un nouveau compte</button>
    	</form>
    </center><br><br>

   <a href="../index.php"><button class="button">Retour</button></a>
  </body>
</html>