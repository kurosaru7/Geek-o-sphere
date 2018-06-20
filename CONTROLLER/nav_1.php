<?php 

	$data=getOneAccount($_SESSION['pseudo']); 
	$credit=$data->fetch(); 
	echo $credit['credit'].' €'; 

?>