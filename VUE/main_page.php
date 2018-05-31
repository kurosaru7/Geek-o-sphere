<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../VUE/style.css" type="text/css" media="all" />
	<meta charset ="UTF-8">
</head>
<body><br>
		<center>
		<img src="../VUE/logo.png" class ="image" />
		<br><br>
			<ul>
			   <li><a href="#">Accueil</a></li>
			   <li><a href="#"><?php echo $_SESSION['pseudo'] ?></a></li>
			   <li><a href="#">Panier</a></li>
			   <li><a href="#">Créditer</a></li>
			   <li style="float:right"><a class="active" href="../CONTROLEUR/Script_main_page_disconnection.php">Déconnexion</a></li>
			</ul>
	<br><br><br><br><br>
	    <form action="../CONTROLEUR/search.php" method="get">
		      <select name="categorie" class="select">
			<option value ="">Catégories</option>
			<?php include('../CONTROLEUR/Script_main_page_2.php'); ?>
		      </select>
		      <select name="sous-categorie" class="select">
			<option value ="">Sous-catégories</option>
			<?php include('../CONTROLEUR/Script_main_page_3.php'); ?>
		      </select> 
	      <button class="button">Chercher</button><br><br><br>
	 
	    </form> 
		</center>
	    <table>
	      <?php include('../CONTROLEUR/Script_main_page_1.php'); ?>
	    </table>
		
</body>
</html>        
