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
              session_start();
              $_SESSION['email'] = $email;
              header("Location: index.php?page=inscriptioninstruments");
            } else{
              ?> <script>alert("L'adresse Mail saisie est déjà utilisée avec un autre compte !")</script><?php
            }
          } else{
            if ($email != $confirmEmail) {
              ?> <script>alert("Les adresses Mail saisies sont différentes !")</script><?php
            }
            if ($mdp != $confirmMdp) {
              ?> <script>alert("Les Mots de passe saisis son différents !")</script><?php
            }
          }
        } else{
          ?> <script>alert("Des champs n'ont pas été remplis !")</script><?php
        }
      }
      $vue = new Vue('Inscription');
      $vue->generer();

    }

  public function inscriptionUtilisateurInstruments(){
    $user = new utilisateurs();
    $afficherInstrumentsNonJoues = $user -> afficherInstrumentsNonJoues($_SESSION['email'])-> fetchAll();

    $vue = new Vue('InscriptionMusique');
    $vue->generer(array("intrumentsNonJoues" => $afficherInstrumentsNonJoues));



}

  }

?>
