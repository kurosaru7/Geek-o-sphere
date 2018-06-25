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

    <div class="image_article">
      <img src="../VIEW/image_sql/<?php echo $image; ?>" class ="image" />
    </div>

		<div class="panier">
			<form action="add_basket.php" method ="post">
				<input type="hidden" name="id" value=<?php echo $_SESSION['id']?>>
				<select name="quantite" class="select" required>
					<option value="" disabled selected>Quantité</option>
          <?php
          for($i=1;$i<$quantite+1;$i++){
            echo '<option value ='.$i.'>'.$i.'</option>';
          }
          ?>
        </select><br>
        <input type="submit" value="Ajouter au panier" class="perso">
       </form>
		</div>
		</center>
	</body>
</html>
