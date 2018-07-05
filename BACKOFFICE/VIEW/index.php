<!DOCTYPE html>
<html>
	<head>
		<title>Page de connexion</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="../VIEW/style.css" />
	</head>
	<body>
		<center><br>
			<h2 class="bo">BACK OFFICE</h2>
			<img src="../VIEW/logo.png" class ="image" />
			<form action ="./index.php" method ="get">
				<input type = "password" placeholder="Mot de passe" class="connection_text" name ="pwd" id="psw" ><br>
				<input type="hidden" name="error" value="<h2 style='color: red'>Mot de passe incorrect !</h2>">
				<button class="button">Se connecter</button>
			</form>
		</center>
	</body>
</html>
