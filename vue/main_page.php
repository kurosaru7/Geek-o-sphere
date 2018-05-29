<!DOCTYPE html>
<html>
  <head>
    <title>PAGE PRINCIPALE</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php session_start(); ?>
    <form action="../CONTROLEUR/search.php" method="get">
      <select name="categorie">
        <option value ="">Tout</option>
        <?php include('../CONTROLEUR/Script_main_page_2.php'); ?>
      </select>
      <select name="sous-categorie">
        <option value ="">Tout</option>
        <?php include('../CONTROLEUR/Script_main_page_3.php'); ?>
      </select> 
      <button>Chercher</button><br> 
 
    </form> 
    <table border=1 cellspacing=2 style="text-align:center">
      <?php include('../CONTROLEUR/Script_main_page_1.php'); ?>
    </table>

  </body>
</html>