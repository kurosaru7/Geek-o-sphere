	<html>
	<head>
		<title>Accueil Geek-O-Sphère</title>
		<link rel="stylesheet" href="style.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Back Office </h1>
		<h3>Ajout de produits en vente</h3>
		<form action ="Script_add_account.php" name="add_article" method="POST">
			Catégorie :<select name="categorie">
				<option selected="Catégorie">
					<option value="Informatique">Informatique</option>
					<option value="High-tech">High-tech</option>
				</select><br>
				Sous-Catégorie: <select name="sous_categorie">
					<option selected="Sous-Catégorie">
						<option value="Souris">Souris</option>
						<option value="Clavier">Clavier</option>
						<option value="divers">Divers</option>
						<option value="ordinateur portable">Ordinateur portable</option>
						<option value="Hardware">Hardware</option>
					</select><br>
					Nom: <input type="text" name="nom"><br>
					Description: <input type="text" name="description"><br>
					Image: <input type="text" name="image"><br>
					Quantité: <input type="number" name="quantite"><br>
					Prix: <input type="number" step="0.01" name="prix">€<br>
					Magasin: <select name="idMagasins">
						<option selected="Magasins">
							<option value="1">Razer</option>
							<option value="2">Logitech</option>
							<option value="3">Corsair</option>
							<option value="4">Wish</option>
							<option value="5">MSI</option>
						</select><br>
						<input type="submit" name="go" value="Ajouter">

					</form>
				</body>
				</html>	