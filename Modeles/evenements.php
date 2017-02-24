<?php

  require_once "Modeles/modele.php";

  class evenements extends modele{

    public function afficherEvenements(){
      $sql = 'SELECT title, start, end FROM evenement';
      $afficherEvenements = $this->executerRequete($sql);
      return $afficherEvenements;
    }

  }

?>
