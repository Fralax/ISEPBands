<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function creerGroupe($id, $nomGroupe, $photoGroupe){
    $sql = 'INSERT INTO groupe (g_nom, g_createur, g_photo) VALUES (:nomGroupe, :id, :photoGroupe)';
    $creerGroupe = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id, 'photoGroupe' => $photoGroupe));
  }

  public function ajouterAppartient($id, $nomGroupe){
    $sql = 'INSERT INTO appartient (g_nom, u_id) VALUES (:nomGroupe, :id)';
    $ajouterAppartient = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id));
  }

  public function afficherMesGroupes($id){
    $sql = 'SELECT g_nom, g_photo FROM groupe NATURAL JOIN appartient WHERE u_id = :id';
    $afficherMesGroupes = $this->executerRequete($sql, array('id' => $id));
    return $afficherMesGroupes;
  }

  public function afficherMembresGroupes($nomGroupe){
    $sql = 'SELECT u_prenom FROM utilisateur NATURAL JOIN appartient WHERE g_nom = ?';
    $afficherMembresGroupes = $this -> executerRequete($sql, array($nomGroupe));
    return $afficherMembresGroupes;
  }

  public function afficherGroupes(){
    $sql = 'SELECT g_nom, g_createur, g_photo FROM groupe';
    $afficherGroupes = $this->executerRequete($sql);
    return $afficherGroupes;
  }

  public function modifierNomGroupe($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE groupe SET g_nom  = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupe = $this->executerRequete($sql, array(
      'nouveauNomGroupe' => $nouveauNomGroupe,
      'nomGroupe' => $nomGroupe
    ));
  }

  public function modifierNomGroupeAppartient($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE appartient SET g_nom = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupeAppartient = $this->executerRequete($sql, array(
      'nouveauNomGroupe' => $nouveauNomGroupe,
      'nomGroupe' => $nomGroupe
    ));
  }

  public function modifierNomGroupeInvitation($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE invitation SET g_nom = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupeInvitation = $this->executerRequete($sql, array(
      'nouveauNomGroupe' => $nouveauNomGroupe,
      'nomGroupe' => $nomGroupe
    ));
  }

  public function modifierNomGroupeJoue($nomGroupe, $nouveauNomGroupe){
    $sql = 'UPDATE joue SET g_nom = :nouveauNomGroupe WHERE g_nom = :nomGroupe';
    $modifierNomGroupeJoue = $this->executerRequete($sql, array(
      'nouveauNomGroupe' => $nouveauNomGroupe,
      'nomGroupe' => $nomGroupe
    ));
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

  public function supprimerGroupe($nomGroupe){
    $sql = 'DELETE FROM groupe WHERE g_nom = :nomGroupe';
    $supprimmerGroupe = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
  }

  public function supprimerGroupeAppartient($nomGroupe){
    $sql = 'DELETE FROM appartient WHERE g_nom = :nomGroupe';
    $supprimmerGroupeAppartient = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
  }

  public function supprimerGroupeJoue($nomGroupe){
    $sql = 'DELETE FROM joue WHERE g_nom = :nomGroupe';
    $supprimerGroupeJoue = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
  }

  public function supprimerGroupeInvitation($nomGroupe){
    $sql = 'DELETE FROM invitation WHERE g_nom = :nomGroupe';
    $supprimmerGroupe = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
  }

  public function ajouterChanson($nomGroupe, $nomChanson, $nomArtiste){
    $sql = 'INSERT INTO joue (g_nom, j_morceau, j_artiste) VALUES (:nomGroupe, :nomChanson, :nomArtiste)';
    $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe,
      'nomChanson' => $nomChanson,
      'nomArtiste' => $nomArtiste
    ));
  }

  public function supprimerChanson($nomGroupe, $nomChanson, $nomArtiste){
    $sql = 'DELETE FROM joue WHERE g_nom = :nomGroupe AND j_morceau = :nomChanson AND j_artiste = :nomArtiste';
    $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe,
      'nomChanson' => $nomChanson,
      'nomArtiste' => $nomArtiste
    ));
  }

  public function afficherPlaylist($nomGroupe){
    $sql = 'SELECT j_morceau, j_artiste FROM joue WHERE g_nom = :nomGroupe';
    $afficherPlaylist = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
    return $afficherPlaylist;
  }

  public function verifierMorceau(){
    $sql = 'SELECT j_morceau, j_artiste FROM joue';
    $verifierMorceau = $this->executerRequete($sql);
    return $verifierMorceau;
  }

}

?>
