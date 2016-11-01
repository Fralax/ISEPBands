<?php

require_once "Modeles/modele.php";

class groupe extends modele {

  public function creerGroupe($id, $nomGroupe){
    $sql = 'INSERT INTO groupe (g_nom, g_createur) VALUES (:nomGroupe, :id)';
    $creerGroupe = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id));
  }

  public function ajouterAppartient($id, $nomGroupe){
    $sql = 'INSERT INTO appartient (a_groupe, u_id) VALUES (:nomGroupe, :id)';
    $ajouterAppartient = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id));
  }

  public function afficherMesGroupes($id){
    $sql = 'SELECT a_groupe FROM appartient WHERE u_id = :id';
    $afficherMesGroupes = $this->executerRequete($sql, array('id' => $id));
    return $afficherMesGroupes;
  }

  public function afficherMembresGroupes($nomGroupe){
    $sql = 'SELECT u_prenom FROM utilisateur NATURAL JOIN appartient WHERE a_groupe = ?';
    $afficherMembresGroupes = $this -> executerRequete($sql, array($nomGroupe));
    return $afficherMembresGroupes;
  }
}

?>
