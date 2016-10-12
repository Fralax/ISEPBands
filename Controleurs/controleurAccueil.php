<?php

  require_once 'Vues/vue.php';

  class accueil{

    public function affichageAccueil(){
      $vue = new Vue('Accueil');
      $vue->generer();
    }

  }

?>
