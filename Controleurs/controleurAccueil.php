<?php
  require_once 'Modeles/utilisateurs.php';
  require_once 'Vues/vue.php';

  class controleurAccueil{

    public function affichageAccueil(){
      $vue = new Vue('Accueil');
      $vue->generer();
    }

  }

?>
