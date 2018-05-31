<html>
	<head>
		<title>Création d'un compte</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="../VUE/style.css" />
	</head>
	<body>
		<center>

		<div class="account">
			<img src="../VUE/logo.png" class="image">
			<form action ="../CONTROLEUR/Script_account_creation.php" method="POST">
				<input type = "text" placeholder ="Nom"name = "nom" value = <?php echo $_POST['nom'] ?>><br>
				<input type = "text" placeholder="Prénom" name = "prenom" value = <?php echo $_POST['prenom'] ?>><br>
				<input type = "text" name = "pseudo" placeholder = "Pseudo" value = <?php echo $_POST['pseudo'] ?>><br>
				<input type = "password" placeholder="Mot de passe" name = "mdp"><br>
				<input type = "submit" value = "Créer">
			</form>

			<br><a href="../index.php"><button class="button2">Retour à la page de connexion</button></a><br>
		</div>
		<?php echo $erreur ?>
		</center>
	</body>
</html>
