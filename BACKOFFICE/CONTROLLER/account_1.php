<?php

	echo "<table>
      	<th>N° Compte
      	<th>Pseudo
      	<th>Nom
      	<th>Prenom
      	<th colspan=2>Action"
    ;

    $query = getAccounts();
    while ( $data = $query -> fetch()) {

    	echo"<tr>
    		 <td>".$data['idClients'].
    		"<td>".$data['pseudo'].
    		"<td>".utf8_encode($data['nom']).
    		"<td>".$data['prenom'].
    		"<td><form action='./change_account.php' method='get'>
    				<input type='hidden' name='id' value='".$data['idClients']."'>
    				<button>Modifier</button>
    			 </form>
    		 <td><form action='./suppr_account.php' method='get'>
    				<input type='hidden' name='id' value='".$data['idClients']."'>
    				<button>Supprimer</button>
    			 </form>";
    }

    echo "</table>";

?>