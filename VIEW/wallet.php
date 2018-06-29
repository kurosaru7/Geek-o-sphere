<?php require("../MODEL/model.php"); ?>
<html>
	<head>
	<title>Page Credit</title>
	<link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
	</head>

	<body>
	<?php include('./navigation_bar.php'); ?>
	<center>

		<br><br><br>
		<br><br><br>
		<br><br><br>
		
		<?php include('./wallet_1.php'); ?>

		<br><br><br>
		<br><br><br>

		<?php include('./wallet_2.php'); ?>

		<br><br><br>

		<form action="./change_wallet.php" method="get">
			<div class="text_p2">Montant : 
			<select name="sign">
				<option value="+">+</option>
				<option value="-">-</option>
			</select>
			<input type="number" name="number" step=0.01 required>
			<button class="button">OK</button>
		</div>
		</form><br>
		<div class="text_p3">Maximum : 100 000,00 € / Minimum : 0 €</div>

	</center>
	</body>
</html>