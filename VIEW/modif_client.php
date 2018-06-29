<?php require("../MODEL/model.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../VIEW/style.css" type="text/css" media="all" />
	<meta charset ="UTF-8">
</head>
<body>
  	
    <div class="align_modif">
    <center>
      Modification des informations
  		<?php include('./navigation_bar.php'); ?>
      <form action="./modif.php" method="POST">
        <?php include('./modify_client_1.php'); ?>
    	<br>
       <input type="submit" class="modification" value="Sauvegarder">
    </form>
  </center>
    <br><a href="./customer_page.php"> <button class="modification2">Retour</button></a><br><br>
    <?php if (isset($result)){
      echo $result;
    }
    ?>
    </div>
  </body>
</html>