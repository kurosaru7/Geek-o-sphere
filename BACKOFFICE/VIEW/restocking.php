<html>
	<head>
		<title>Gestion des stocks</title>
		<link rel="stylesheet" href="../../VIEW/style.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Choisir le(s) produits à gérer</h1><br>		
		<?php include('./error.php'); ?>
		<table>
			<tr><th>Nom de l'article</th><th>Stock actuel</th><th colspan=4>Opération</th></tr>
		<?php include ('../CONTROLLER/print_products.php'); ?>
		</table>
	<a href="../index.php"><button class="button">Retour</button></a>
</body>
</html>