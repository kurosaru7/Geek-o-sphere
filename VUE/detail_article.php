<html>
	<head>
	<title>Page Article</title>
	<link rel="stylesheet" href="../VUE/style.css" type="text/css" media="all" />
	</head>

	<body>
	<ul>
		<li><a href="Script_main_page.php">Accueil</a></li>
		<li><a href="Script_client_page.php"><?php echo $_SESSION['pseudo'] ?></a></li>
		<li><a href="#">Panier</a></li>
		<li><a href="#"><?php $data=getOneAccount($_SESSION['pseudo']); $credit=$data->fetch(); echo $credit['credit'].' €'; ?></a></li>
		<li style="float:right"><a class="active" href="../CONTROLEUR/Script_main_page_disconnection.php">Déconnexion</a></li>
	</ul>

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
