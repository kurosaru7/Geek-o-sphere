<?php require("../MODEL/model.php"); ?>
<html>
	<head>
	<title>Page Article</title>
	<link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
	</head>

	<body>
	<?php include('./navigation_bar.php'); ?>

	<center>

	<div class="nom_article">
	<? echo $nom; ?>
	</div>
	

	<div class="quantite">
	<? echo $quantite.' en stock'; ?>
	</div>

	<div class="categorie">
	<? echo $categorie; ?>
	</div>

	<div class="sous_categorie">
	<? echo $sous_categorie; ?>
	</div>

	<div class="prix">
	<? echo $prix.' €'; ?>
	</div>

	<div class="description">
	<? echo $description; ?>
	</div>

	</center>
	</body>
</html>
