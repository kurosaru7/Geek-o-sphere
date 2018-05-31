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
				<input type = "text" placeholder ="Nom" name = "f_name" value = <?php
				if(isset($_POST['f_name'])) { 
					echo $_POST['f_name']; 
				} ?>><br>
				<input type = "text" placeholder="Prénom" name = "s_name" value = <?php
				if(isset($_POST['s_name'])) { 
					echo $_POST['s_name']; 
				} ?>><br>
				<input type = "text" name = "pseudo" placeholder = "Pseudo" value = <?php
				if(isset($_POST['pseudo'])) { 
					echo $_POST['pseudo']; 
				} ?>><br>
				<input type = "password" placeholder="Mot de passe" name = "pwd"><br>
				<input type = "submit" value = "Créer">
			</form>

			<br><a href="../index.php"><button class="button2">Retour à la page de connexion</button></a><br>
		</div>
		<?php 
		if(isset($error)) {
			echo $error;
		} ?>
		</center>
	</body>
</html>
