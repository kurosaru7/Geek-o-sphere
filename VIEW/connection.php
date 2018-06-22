<!DOCTYPE html>
<html>
	<head>
		<title>Page de connexion</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="VIEW/style.css" />
	</head>
	<body>
		<center>
		<img src="VIEW/logo.png" class ="image" />
		<?php echo $not_valid_info ?>
			<form action ="index.php" method ="POST">
				<input type = "text" class="connection_text" placeholder ="Pseudo" name ="pseudo" id ="psd" value =
				<?php if(isset($_POST['pseudo'])) {
						echo $_POST['pseudo'];
				} ?> >
				<br>
					<input type = "password" placeholder="Mot de passe" class="connection_text" name ="pwd" id="psw" ><br>
					<input type = "submit" value = "Se connecter" class="connection">
			</form>
			<a href ="CONTROLLER/account_creation.php"><button class="connection">Créer un compte</button></a>
		</center>
	</body>
</html>
