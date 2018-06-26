<html>
	<head>
		<title>Création d'un compte</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="../../VIEW/style.css" />
	</head>
	<body>
		<center>

			<?php require('./error.php') ?>

			<form action ="./account_creation.php" method="POST">
				<input type = "text" class="connection_text" placeholder ="Nom" name = "f_name" value = <?php
				if(isset($_POST['f_name'])) {
					echo $_POST['f_name'];
				} ?>><br>
				<input type = "text" class="connection_text" placeholder="Prénom" name = "s_name" value = <?php
				if(isset($_POST['s_name'])) {
					echo $_POST['s_name'];
				} ?>><br>
				<input type = "text" name = "pseudo" class="connection_text" placeholder = "Pseudo" value = <?php
				if(isset($_POST['pseudo'])) {
					echo $_POST['pseudo'];
				} ?>><br>
				<input type = "password" class="connection_text" placeholder="Mot de passe" name = "pwd"><br>
				<input type = "submit" class="connection" value = "Créer">
			</form>

			<a href="./account.php"><button class="button">Retour</button></a>

		</center>
	</body>
</html>
