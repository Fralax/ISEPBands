<?php

  require_once 'Vues/vue.php';

  class annuaire{

    public function affichageAnnuaire(){
      $vue = new Vue('Annuaire');
      $vue->generer();
    }


  }

?>
