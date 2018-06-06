<?php require("../MODEL/model.php"); ?>
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
			   <li><a href="./Script_main_page.php">Accueil</a></li>
			   <li><a href="./Script_client_page.php"><?php echo $_SESSION['pseudo'] ?></a></li>
			   <li><a href="#">Panier</a></li>
			   <li><a href="#"><?php $data=getOneAccount($_SESSION['pseudo']); $credit=$data->fetch(); echo $credit['credit'].' €'; ?></a></li>
			   <li style="float:right"><a class="active" href="../CONTROLEUR/Script_main_page_disconnection.php">Déconnexion</a></li>
			</ul>
	<br><br><br><br><br>
	    <form action="../CONTROLEUR/search.php" method="get">
	    	<input type="text" name="chain">
		    <select name="class" class="select">
				<option value ="">Catégories</option>
				<?php include('../CONTROLEUR/Script_main_page_2.php'); ?>
		    </select>
		    <select name="under-class" class="select">
				<option value ="">Sous-catégories</option>
				<?php include('../CONTROLEUR/Script_main_page_3.php'); ?>
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
	      <?php include('../CONTROLEUR/Script_main_page_1.php'); ?>
	    </table>
		
</body>
</html>        
