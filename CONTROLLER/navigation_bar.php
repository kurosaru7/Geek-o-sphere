			<ul>
			   <li><a href="./main_page.php">Accueil</a></li>
			   <li><a href="./customer_page.php"><?php echo $_SESSION['pseudo'] ?></a></li>
			   <li><a href="#">Panier</a></li>
			   <li><a href="./wallet.php"><?php $data=getOneAccount($_SESSION['pseudo']); $credit=$data->fetch(); echo $credit['credit'].' €'; ?></a></li>
			   <li style="float:right"><a class="active" href="../CONTROLLER/main_page_disconnect.php">Déconnexion</a></li>
			</ul>