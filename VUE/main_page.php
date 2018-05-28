<!DOCTYPE html>
<html>
	<head>
		<title>PAGE PRINCIPALE</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="../CONTROLEUR/search.php" method="get">
			<select name="categorie">
				<option value ="">Tout</option>
				<option value="Informatique">Informatique</option>
				<option value="High-tech">High-tech</option>
			</select>
			<select name="sous-categorie">
				<option value ="">Tout</option>
				<option value="Souris">Souris</option>
				<option value="Clavier">Clavier</option>
				<option value ="divers">Divers</option>
				<option value ="ordinateur portable">Ordi</option>
				<option value ="Hardware"></option>
			</select>
			<button>Chercher</button><br>

		</form>
		<table border=1 cellspacing=2 style="text-align:center">
			<?php include('../CONTROLEUR/Script_main_page_1.php'); ?>
		</table>

	</body>
</html>