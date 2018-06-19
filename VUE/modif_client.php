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
			<?php include('./Nav_barre.php'); ?>
			<table>
	      		<?php include('./Script_modif_client_1.php'); ?>
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
