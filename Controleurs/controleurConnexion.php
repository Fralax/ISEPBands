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
          $_SESSION['prenom'] = $resultatMdp['u_prenom'];
          $_SESSION['id'] = $resultatMdp['u_id'];
          if ($resultatMdp['u_valide'] == "0") {
            header("Location: profil/".$_SESSION['id']);
          } else{
            header("Location: accueil");
          }
        } else{
          ?> <script> alert("L'adresse mail ou le mot de passe est erroné !") </script> <?php
        }
      }

    }

    public function deconnexionUtilisateur(){
      $_SESSION = array();
      session_destroy();
      header("Location: accueil");
    }


  }

?>
