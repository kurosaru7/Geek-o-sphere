<?php

	$query = getOneAccount($_SESSION['pseudo']);
	while ( $data = $query -> fetch()) {

		echo '<div class="text_p">Credit Actuel : '.$data['credit'].' €</div>';
	}

?>