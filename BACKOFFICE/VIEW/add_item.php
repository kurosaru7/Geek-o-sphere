<html>
<head>
	<title>Back office Geek-O-Sphère</title>
	<link rel="stylesheet" href="../../VIEW/style.css">
	<meta charset="UTF-8">
</head>
<body>
	<h1>Back Office</h1>
	<h3>Ajout de produits en vente</h3>
	<?php include('./error.php'); ?>
	<form action ="../CONTROLLER/add.php" name="add_item" method="POST">
	Catégorie :<select name="class">
		<option selected="">
		<?php include('../CONTROLLER/option_backoffice.php');	?>
	</select><br>
	Sous-Catégorie: <select name="subclass">
	<option selected value=""></option>
		<?php include('../../CONTROLLER/main_page_3.php');	?>
	<option value="Hardware">Hardware</option>
	</select><br>
	Nom: <input type="text" maxlength=100 name="name"><br>
	Description: <input type="text" maxlength=140 name="description"><br>
	Image: <input type="text" maxlength=45 name="picture"><br>
	Quantité: <input type="number" max=9999 name="quantity"><br>
	Prix: <input type="number" max=9999.99 step="0.01" name="price">€<br>
	Magasin: <select name="idShop">
	<option selected="">
		<?php include ('./shop_backoffice.php'); ?>
	</select><br>
	<input type="submit" name="go" value="Ajouter">
	</form>

	<a href="./home.php"><button class="button">Retour</button></a>
</body>
</html>