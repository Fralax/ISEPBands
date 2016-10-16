<?php

  require_once 'Vues/vue.php';

  class controleurAnnuaire{

    public function affichageAnnuaire(){
      $vue = new Vue('Annuaire');
      $vue->generer();
    }


  }

?>
