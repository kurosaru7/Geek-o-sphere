<html>
<head>
	<title>Back office Geek-O-Sphère</title>
	<link rel="stylesheet" href="../VIEW/style.css">
	<meta charset="UTF-8">
</head>
<body>
	<h1>Back Office</h1>
	<h3>Ajout de produits en vente</h3>
	<form action ="../CONTROLLER/add_items.php" name="add_item" method="POST">
	Catégorie :<select name="class">
		<option selected="">
		<?php include('../CONTROLLER/option_backoffice.php');	?>
	</select><br>
	Sous-Catégorie: <select name="subclass">
	<option selected value=""></option>
		<?php include('../CONTROLLER/Script_main_page_3.php');	?>
	<option value="Hardware">Hardware</option>
	</select><br>
	Nom: <input type="text" name="name"><br>
	Description: <input type="text" name="description"><br>
	Image: <input type="text" name="picture"><br>
	Quantité: <input type="number" name="quantity"><br>
	Prix: <input type="number" step="0.01" name="price">€<br>
	Magasin: <select name="idShop">
	<option selected="">
		<?php include ('../CONTROLLER/Script_shop_backoffice.php'); ?>
	</select><br>
	<input type="submit" name="go" value="Ajouter">
	</form>
</body>
</html>	