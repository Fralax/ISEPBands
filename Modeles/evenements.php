<?php

  require_once "Modeles/modele.php";

  class evenements extends modele{

    public function afficherEvenements(){
      $sql = 'SELECT id, title, start, end FROM evenement';
      $afficherEvenements = $this->executerRequete($sql);
      return $afficherEvenements;
    }

    public function creerEvenement($groupe, $debut, $fin){
      $sql = 'INSERT INTO evenement (title, start, end) VALUES (:groupe, :debut, :fin)';
      $creerEvenement = $this->executerRequete($sql, array(
        'groupe' => $groupe,
        'debut' => $debut,
        'fin' => $fin
      ));
    }

    public function modifierEvenement($id, $debut, $fin){
      $sql = 'UPDATE evenement SET start = :debut, end = :fin WHERE id = :id';
      $modidierEvenement = $this->executerRequete($sql, array(
        'debut' => $debut,
        'fin' => $fin,
        'id' => $id
      ));
    }

    public function supprimerEvenement($id){
      $sql = 'DELETE FROM evenement WHERE id = :id';
      $supprimerEvenement = $this->executerRequete($sql, array(
        'id' => $id
      ));
    }

  }

?>
