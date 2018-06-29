<?php

  echo "<table>
      <th>Jour
      <th>Heure
      <th>Etat
      <th>Quantité
      <th>Client
      <th colspan=3>Article
     "
  ;

  $test = false;

  $query = historyAll("");

  while ( $data = $query -> fetch()) {

    if ($data['achats.etat'] == "En cours") {

      echo"<tr>
         <td>".$data['achats.date'].
        "<td>".$data['achats.time'].
        "<td>".utf8_encode($data['achats.etat']).
        "<td>".$data['achats.quantite'].
        "<td>".$data['clients.pseudo'].
        "<td>".utf8_encode($data['articles.nom']).

        "<td> <form action='./valid_delivery.php' method='get'>
                <input type='hidden' name='id' value='".$data['achats.idAchats']."'>
               <button>Confirmer la livraison</button>
             </form>"
      ;
      $test = true;
    }

  } if (!$test) {

    echo"<tr><td><td><td><td colspan=4>Aucun achat effectuer";
  }

  echo"</table>";

?>