<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurInscription{

    public function inscriptionUtilisateur(){

      $envoyer = $_POST['envoyer'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $confirmEmail = $_POST['confirmEmail'];
      $mdp = $_POST['mdp'];
      $confirmMdp = $_POST['confirmMdp'];
      $portable = $_POST['portable'];
      $promo = $_POST['promo'];
      $dateInscription = date('Y-m-d');
      $valide = 0;
      $user = new utilisateurs();

      if (isset($envoyer)){
        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($confirmEmail) && !empty($mdp) && !empty($confirmMdp) && !empty($promo) && !empty($portable)){
          if ($email == $confirmEmail && $mdp == $confirmMdp){
            $resultatEmail = $user->verifierEmail($email)->fetch();
            if (!$resultatEmail){
              $mdp = password_hash($mdp, PASSWORD_BCRYPT);
              $user->inscrireUtilisateur($prenom, $nom, $email, $mdp, $portable, $promo, $dateInscription, $valide);
              header("Location: index.php");
            } else{
              echo "L'adresse Mail saisie est déjà utilisée avec un autre compte !";
            }
          } else{
            if ($email != $confirmEmail) {
              echo "Les adressses Mail ne sont pas identiques !";
            }
            if ($mdp != $confirmMdp) {
              echo "Les mots de passe de sont pas identiques !";
            }
          }
        } else{
          echo "Des champs n'ont pas été remplis !";
        }
      }
      $vue = new Vue('Inscription');
      $vue->generer();

    }


  }

?>
