<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function inscrireUtilisateur(){
    $sql = 'INSERT INTO utilisateur (u_prenom,u_nom,u_email) VALUES (:prenom,:nom,:email)';
    $inscrireUtilisateur = $this->executerRequete($sql, array('prenom' => $_POST['prenom'], 'nom' => $_POST['nom'], 'email' => $_POST['email']));
  }

  public function afficherTest(){
    $sql = 'SELECT * FROM utilisateur WHERE u_email=?';
    $afficherTest = $this->executerRequete($sql, array($_POST['email']));
    return $afficherTest;
  }

}
