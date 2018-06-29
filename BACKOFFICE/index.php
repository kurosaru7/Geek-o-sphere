<?php
	session_start();

	if (isset($_GET['pwd'])) {
	
		if ($_GET['pwd'] == "srouil") {

			$_SESSION['co'] = true;
			header('location: CONTROLLER/home.php');

		} else {
			echo "<br><center>";
			require('CONTROLLER/error.php');
			echo "</center>";
			require('VIEW/index.php');
		}

	} else {
	
		require('VIEW/index.php');
	}
?>