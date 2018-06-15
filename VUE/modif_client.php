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
			<ul>
			   <li><a href="./Script_main_page.php">Accueil</a></li>
			   <li><a href="./Script_client_page.php"><?php echo $_SESSION['pseudo'] ?></a></li>
			   <li><a href="#">Panier</a></li>
			   <li><a href="#"><?php $data=getOneAccount($_SESSION['pseudo']); $credit=$data->fetch(); echo $credit['credit'].' €'; ?></a></li>
			   <li style="float:right"><a class="active" href="../CONTROLEUR/Script_main_page_disconnection.php">Déconnexion</a></li>
			</ul>
			<table>
	      		<?php include('../CONTROLEUR/Script_modif_client_1.php'); ?>
	      	</table>
		</center>
		<br>
		<a href="./Script_client_page.php">
			<button class="button">Annuler</button>
		</a><a href="./Script_modif.php">
			<button class="right">Sauvegarder</button>
		</a>
	</body>
</html>
