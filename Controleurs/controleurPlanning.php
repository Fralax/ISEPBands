<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/evenements.php';

  class controleurPlanning{

    public function affichagePlanning(){
      $vue = new Vue('Planning');
      $vue->generer();
    }

    public function recuperationEvenements(){
      $event = new evenements();
      $evenements = json_encode($event->afficherEvenements()->fetchAll());
      echo $evenements;
    }

    public function modificationEvenement(){
      $event = new evenements();
      
    }

  }

?>
