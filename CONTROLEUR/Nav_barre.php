			<ul>
			   <li><a href="./Script_main_page.php">Accueil</a></li>
			   <li><a href="./Script_client_page.php"><?php echo $_SESSION['pseudo'] ?></a></li>
			   <li><a href="#">Panier</a></li>
			   <li><a href="#"><?php $data=getOneAccount($_SESSION['pseudo']); $credit=$data->fetch(); echo $credit['credit'].' €'; ?></a></li>
			   <li style="float:right"><a class="active" href="../CONTROLEUR/Script_main_page_disconnection.php">Déconnexion</a></li>
			</ul>