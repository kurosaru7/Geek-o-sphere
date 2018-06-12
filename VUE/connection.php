<!DOCTYPE html>
<html>
	<head>
		<title>Page de connexion</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="VUE/style.css" />
	</head>
	<body>
		<center>
		<img src="VUE/logo.png" class ="image" />
		<?php echo $not_valid_info ?>
		<div>
			<form action ="index.php" method ="POST">
				<input type = "text" placeholder ="Pseudo" name ="pseudo" id ="psd" value = 
				<?php if(isset($_POST['pseudo'])) {
						echo $_POST['pseudo']; 
				} ?> >
				<br>
				<input type = "password" placeholder="Mot de passe" name ="pwd" id="psw"><br>
				<input type = "submit" value = "Se connecter">
			</form>
			<a href ="CONTROLEUR/Script_account_creation.php"><button class="button">Créer un compte</button></a>
		</div>
		</center>
	</body>
</html>
