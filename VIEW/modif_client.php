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
      <form action="./modif.php" method="POST">
        <?php include('./modify_client_1.php'); ?>
    	<br>

      <div class ="test">
       <input type="submit" class="change" value="Sauvegarder">
      </div>
    </form>
  </center>
    <a href="./customer_page.php"> <button class="button">Retour</button></a>
    <?php if (isset($result)){
      echo $result;
    }
    ?>
  </body>
</html>