<?php require("../MODEL/model.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
	<meta charset ="UTF-8">
</head>
<body><br>
		<center>
		<img src="../VIEW/logo.png" class ="image" />
			<?php include('./navigation_bar.php'); ?>
			<table>
	      		<?php include('./modify_client_1.php'); ?>
	      	</table>
		</center>
		<br>
  		<a href="./customer_page.php">
  			<button class="button">Annuler</button>
        
    <div class ="test">    
  		</a><a href="./modif.php">
  			<button class="change">Sauvegarder</button>
  		</a>
  </div>
	</body>
</html>