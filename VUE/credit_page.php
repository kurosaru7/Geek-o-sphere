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
		Compteur : 
		<select name="sign">
			<option value="+">+</option>
			<option value="-">-</option>
		</select>
		<select>
			<?php
			for ($i=1; $i < 1001; $i=$i) { 
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
			?>
		</select>

	</center>
	</body>
</html>