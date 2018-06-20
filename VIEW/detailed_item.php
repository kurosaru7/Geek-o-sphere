<html>
	<head>
	<title>Page Article</title>
	<link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
	</head>

	<body>
	<?php include('./navigation_bar.php'); ?>

	<center>

	<div class="nom_article">
	<?php echo $nom; ?>
	</div>


	<div class="quantite">
	<?php echo $quantite.' en stock'; ?>
	</div>

	<div class="categorie">
	<?php echo $categorie; ?>
	</div>

	<div class="sous_categorie">
	<?php echo $sous_categorie; ?>
	</div>

	<div class="prix">
	<?php echo $prix.' €'; ?>
	</div>

	<div class="description">
	<?php echo $description; ?>
	</div>

	</center>
	</body>
</html>
