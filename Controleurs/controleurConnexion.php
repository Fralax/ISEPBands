<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurConnexion{


    public function connexionUtilisateur(){

      $connexion = $_POST['connexion'];
      $email = $_POST['emailAccueil'];
      $mdp = $_POST['mdpAccueil'];
      $user = new utilisateurs();
      if (isset($connexion)){
        $resultatMdp = $user->verifierMdp($email)->fetch();
        if (password_verify($mdp, $resultatMdp[0])){
          session_start();
          $_SESSION['email'] = $resultatMdp['u_email'];
          var_dump($_SESSION['email']);
          header("Location: index.php?page=accueil");
        } else{
          ?> <script> alert("L'adresse mail ou le mot de passe est erroné !") </script> <?php
        }
      }

    }


  }

?>
