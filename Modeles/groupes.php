<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function creerGroupe($id, $nomGroupe){
    $sql = 'INSERT INTO groupe (g_nom, g_createur) VALUES (:nomGroupe, :id)';
    $creerGroupe = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id));
  }

  public function ajouterAppartient($id, $nomGroupe){
    $sql = 'INSERT INTO appartient (g_nom, u_id) VALUES (:nomGroupe, :id)';
    $ajouterAppartient = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id));
  }

  public function afficherMesGroupes($id){
    $sql = 'SELECT g_nom FROM appartient WHERE u_id = :id';
    $afficherMesGroupes = $this->executerRequete($sql, array('id' => $id));
    return $afficherMesGroupes;
  }

  public function afficherMembresGroupes($nomGroupe){
    $sql = 'SELECT u_prenom FROM utilisateur NATURAL JOIN appartient WHERE g_nom = ?';
    $afficherMembresGroupes = $this -> executerRequete($sql, array($nomGroupe));
    return $afficherMembresGroupes;
  }

  public function afficherGroupes(){
    $sql = 'SELECT * FROM groupe';
    $afficherGroupes = $this->executerRequete($sql);
    return $afficherGroupes;
  }

  public function modifierNomGroupe($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE groupe SET g_nom  = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupe = $this->executerRequete($sql, array('nouveauNomGroupe' => $nouveauNomGroupe, 'nomGroupe' => $nomGroupe));
  }

  public function modifierNomGroupeAppartient($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE appartient SET g_nom = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupeAppartient = $this->executerRequete($sql, array('nouveauNomGroupe' => $nouveauNomGroupe, 'nomGroupe' => $nomGroupe));
  }

  public function modifierNomGroupeInvitation($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE invitation SET g_nom = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupeInvitation = $this->executerRequete($sql, array('nouveauNomGroupe' => $nouveauNomGroupe, 'nomGroupe' => $nomGroupe));
  }

  public function afficherPhotoGroupe($nomGroupe){
    $sql = 'SELECT g_photo FROM groupe WHERE g_nom = :nomGroupe';
    $afficherPhotoGroupe = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
    return $afficherPhotoGroupe;
  }

  public function modifierPhotoGroupe($nomGroupe, $photo){
    $sql = 'UPDATE groupe SET g_photo = :photo WHERE g_nom = :nomGroupe';
    $modifierPhotoGroupe = $this->executerRequete ($sql, array(
      'photo' => $photo,
      'nomGroupe' => $nomGroupe
    ));
  }

}

?>
