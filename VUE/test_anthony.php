<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="test_css_anthony.css" />
</head>
<body>

<ul id="nav">
   <li id="nav-home"><a href="#">Accueil</a></li>
   <li id="nav-about"><a href="#">Page Client</a></li>
   <li id="nav-reviews"><a href="#">Panier</a></li>
   <li id="nav-contact"><a href="#">Créditer</a></li>
</ul>
<br><br><br><br><br>
<?php session_start(); ?>
    <form action="../CONTROLEUR/search.php" method="get">
      <select id="tab2" name="categorie">
        <option value ="">Tout</option>
        <?php include('../CONTROLEUR/Script_main_page_2.php'); ?>
      </select>
      <select id="tab2" name="sous-categorie">
        <option value ="">Tout</option>
        <?php include('../CONTROLEUR/Script_main_page_3.php'); ?>
      </select> 
      <button id="tab2">Chercher</button><br><br><br>
 
    </form> 
    <table id="tab" border=1 cellspacing=2 style="text-align:center">
      <?php include('../CONTROLEUR/Script_main_page_1.php'); ?>
    </table>

</body>
</html>        