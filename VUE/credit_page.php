<?php require("../MODEL/model.php"); ?>
<html>
	<head>
	<title>Page Credit</title>
	<link rel="stylesheet" href="../VUE/style.css" type="text/css" media="all" />
	</head>

	<body>
	<?php include('./Nav_barre.php'); ?>
	<center>

		<br><br><br>
		<br><br><br>
		<br><br><br>
		<?php include('./Script_credit_page_1.php'); ?>
		<br><br><br>
		<br><br><br>
		<br><br><br>
		<form action="./test.php" method="get">
			<div class="text_p2">Compteur : 
			<select name="sign">
				<option value="+">+</option>
				<option value="-">-</option>
			</select>
			<input type="number" name="number" required>
			<button class="button">OK</button>
		</div>
		</form>

	</center>
	</body>
</html>