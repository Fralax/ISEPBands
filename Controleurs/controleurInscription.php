<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';

  class inscription{

   public function inscriptionUtilisateur(){
     $envoyer = $_POST["envoyer"];
     $nom = $_POST["nom"];
     $prenom = $_POST["prenom"];
     $email = $_POST["email"];
     $confirmEmail = $_POST["confirmEmail"];
     $user = new utilisateurs();

     if (isset ($envoyer)){
       if (($nom != "") && ($prenom != "") && ($email != "") && ($confirmEmail != "")){
         if ($email == $confirmEmail){
           $user->inscrireUtilisateur();
           header("Location: index.php");
          }else{
            echo "Les emails ne correspondent pas ! :(";
          }
        }
      }
      $vue = new Vue('Inscription');
      $vue->generer();
    }
  }

?>
