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

  if ($_SESSION['clients'] == "") {

    $cond = '';

  } else {

    $cond = ' AND `clients`.idClients="'.$_SESSION['clients'].'"';
  }

  if ($_SESSION['id'] == "") {

    $query = historyAll($cond);

  } else {

    $query = historySelect($cond);
  }

  while ( $data = $query -> fetch()) {

    echo"<tr>
       <td>".$data['achats.date'].
      "<td>".$data['achats.time'].
      "<td>".utf8_encode($data['achats.etat']).
      "<td>".$data['achats.quantite'].
      "<td>".$data['clients.pseudo'].
      "<td>".utf8_encode($data['articles.nom']).

      "<td> <form action='./remove_history.php' method='get'>
              <input type='hidden' name='id' value='".$data['achats.idAchats']."'>
              <button>Supprimer</button>
            </form>"
    ;
    $test = true;

  } if (!$test) {

    echo"<tr><td><td><td><td colspan=4>Aucun achat effectuer";
  }

  echo"</table>";

?>