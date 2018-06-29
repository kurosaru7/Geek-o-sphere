<html>
	<head>
    <meta charset="UTF-8">
		<title>Page Article</title>
		<link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
	</head>

	<body>
		<?php include('./navigation_bar.php'); ?>

		<center>

		<div class="nom_article">
			<?php echo $nom; ?><br>
		</div>


		<div class="quantite">
			<?php echo $quantite.' en stock'; ?><br>
		</div>

		<div class="categorie">
			<?php echo $categorie; ?><br>
		</div>

		<div class="sous_categorie">
			<?php echo $sous_categorie; ?><br>
		</div>

		<div class="prix">
			EUR <?php echo $prix.''; ?><br>
		</div>

		<div class="description">
			<?php echo $description; ?><br>
		</div>


      <div class="zoom">
        <div class="image_article">
          <img src="../VIEW/image_sql/<?php echo $image; ?>" class ="image" /><br>
        </div>
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
        <input type="submit" value="Ajouter au panier" class="modification3">
       </form>
		</div>
		</center>
	</body>
</html>
