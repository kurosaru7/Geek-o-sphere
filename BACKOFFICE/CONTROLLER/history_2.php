<?php

  $query = getAccounts();
  while ( $data = $query -> fetch()) { //Print SELECT

    echo '<option value="'.utf8_encode($data['idClients']).'">'.utf8_encode($data['pseudo']).'</option>';
  }

?>