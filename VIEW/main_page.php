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
      <form action="./search.php" method="get">
        <input type="text" name="chain" class="connection_text" placeholder="Recherche">
        <select name="class" class="select">
        <option value ="">Catégories</option>
        <?php include('./main_page_2.php'); ?>
        </select>
        <select name="under-class" class="select">
        <option value ="">Sous-catégories</option>
        <?php include('./main_page_3.php'); ?>
        </select>
        <select name="order" class="select">
          <option value ="">Trier par</option>
          <option value ="prix">Prix (Croissant)</option>
          <option value ="prix DESC">Prix (Décroissant)</option>
          <option value ="quantite">Quantité (Croissant)</option>
          <option value ="quantite DESC">Quantité (Décroissant)</option>
        </select>
          <button class="button">Chercher</button><br><br><br>
      </form>
    </center>
      <table>
        <?php include('./main_page_1.php'); ?>
      </table>

</body>
</html>
