<html>
	<head>
		<title>Gestion des stocks</title>
		<link rel="stylesheet" href="style.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Choisir le(s) produits à réapprovisionner</h1><br>
		<form action ="../CONTROLLER/manage_stock.php" method="POST">
			<table>
				<tr><th>Nom de l'article</th><th>Stock actuel</th><th>Opération</th></tr>
			<?php include ('../CONTROLLER/print_products.php'); ?>
			</table>
		</form>
	<a href="../index.php"><button>Retour</button></a>
</body>
</html>	