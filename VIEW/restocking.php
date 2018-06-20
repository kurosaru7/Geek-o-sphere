<html>
	<head>
		<title>Accueil Geek-O-Sphère</title>
		<link rel="stylesheet" href="style.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Choisir le produit à réapprovisionner</h1><br>
		<form action ="./add_stock.php" method="POST">
			<table>
				<tr><th>Nom de l'article</th><th>Stock actuel</th><th>Ajouter</th></tr>
			<?php include ('./print_products.php'); ?> 
	</table>
	<input type="submit" name="add" value="Ajouter">
	</form>
</body>
</html>	