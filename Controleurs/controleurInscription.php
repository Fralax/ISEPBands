<?php

  require_once 'Vues/vue.php';

  $email = $_POST["email"];
  class inscription{

    public $mail = $this->email;

    public function affichageInscription(){
      $vue = new Vue('Inscription');
      $vue->generer();
    }

  //  public function nouveauMembre(){}
      //ET LA ON MET LES TRUCS VERS LE MODELEINSCRIPTION





  }

?>
