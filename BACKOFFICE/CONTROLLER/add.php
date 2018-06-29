<?php
require('../../MODEL/model.php');

if(isset($_FILES['picture'])){

  $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

  $extension_upload = strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  );

  if(in_array($extension_upload,$extensions_valides)){
       $extension = true;
       $dossier = '../../VIEW/image_sql/';
       $fichier = basename($_FILES['picture']['name']);
       if(move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
       {
            $error = 'Upload effectué avec succès !';
       }
       else //Sinon (la fonction renvoie FALSE).
       {
            $error = 'Echec de l\'upload !';
       }
  }else{
    $extension = false;
  }
}

if($extension){
    addItem(($_POST['class']),utf8_decode($_POST['name']),utf8_decode($_POST['description']),utf8_decode($_FILES['picture']['name']),($_POST['quantity']),($_POST['idShop']),($_POST['price']),utf8_decode($_POST['subclass']));
    $error = "<h2 style='color: Green'>Le produit a bien été ajouté!";
}else{
    $error = "<h2 style='color : Red'>Extension non valide";
}

header('location: ../CONTROLLER/add_item.php?error='.$error);

?>