<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function verifierEmail($email){
    $sql = 'SELECT u_email FROM utilisateur WHERE u_email = :email';
    $resultatEmail = $this->executerRequete($sql, array( 'email' => $email));
    return $resultatEmail;
  }


  public function inscrireUtilisateur($prenom, $nom, $email, $mdp, $portable, $promo, $dateInscription, $valide, $photo){
    $sql = 'INSERT INTO utilisateur (u_prenom, u_nom, u_email, u_mdp, u_portable, u_promo, u_dateInscription, u_valide, u_photo) VALUES (:prenom, :nom, :email, :mdp, :portable, :promo, :dateInscription, :valide, :photo)';

    $inscrireUtilisateur = $this->executerRequete($sql, array('prenom' => $prenom, 'nom' => $nom, 'email' => $email, 'mdp' => $mdp, 'portable' => $portable, 'promo' => $promo, 'dateInscription' => $dateInscription, 'valide' => $valide, 'photo' => $photo));
  }


  public function verifierMdp($email){
    $sql = 'SELECT u_mdp, u_email, u_prenom, u_id, u_valide FROM utilisateur WHERE u_email = :email';
    $resultatMdp = $this->executerRequete($sql, array('email' => $email));
    return $resultatMdp;
  }

  public function recupererID($email){
    $sql = 'SELECT u_id FROM utilisateur WHERE u_email = :email';
    $recupererID = $this->executerRequete($sql, array('email' => $email));
    return $recupererID;
  }


  public function pratiquerInstrument($id, $instrument, $niveau, $annees){
    $sql = 'INSERT INTO pratique (p_id, p_instrument, p_niveau, p_annees) VALUES (:id, :instrument, :niveau, :annees)';
    $ajouterInstrument = $this->executerRequete($sql, array('id' => $id, 'instrument' => $instrument, 'niveau' => $niveau, 'annees' => $annees));
  }


  public function afficherInstrumentsNonJoues($id){
    $sql = 'SELECT i_instrument FROM instrument WHERE i_instrument NOT IN (SELECT p_instrument FROM pratique WHERE p_id= :id)';
    $afficherInstrumentsNonJoues = $this->executerRequete($sql, array('id' => $id));
    return $afficherInstrumentsNonJoues;
  }

  public function afficherInstrumentsJoues($id){
    $sql = 'SELECT p_instrument, p_niveau, p_annees FROM pratique WHERE p_id = :id ORDER BY p_annees DESC';
    $afficherInstrumentsJoues = $this->executerRequete($sql, array('id' => $id));
    return $afficherInstrumentsJoues;
  }

  public function verifierValide($id){
    $sql = 'SELECT u_valide FROM utilisateur WHERE u_id = :id';
    $recupererValide = $this->executerRequete($sql, array('id' => $id));
    return $recupererValide;
  }

  public function afficherInfosMembre($id){
    $sql = 'SELECT u_prenom, u_nom, u_email, u_mdp, u_portable, u_promo, u_dateInscription, u_valide, u_photo, u_facebook FROM utilisateur WHERE u_id = :id';
    $afficherMesInfos = $this->executerRequete ($sql, array('id' => $id));
    return $afficherMesInfos;
  }

  public function modifierPhoto($id, $photo){
    $sql = 'UPDATE utilisateur SET u_photo = :photo WHERE u_id = :id';
    $modifierPhoto = $this->executerRequete ($sql, array('photo' => $photo, 'id' => $id));
  }

  public function afficherPhoto($id){
    $sql = 'SELECT u_photo FROM utilisateur WHERE u_id = :id';
    $afficherPhoto = $this->executerRequete($sql, array('id' => $id));
    return $afficherPhoto;
  }

  public function ajouterLienFacebook($id, $lien){
    $sql = 'UPDATE utilisateur SET u_facebook = :lien WHERE u_id = :id';
    $ajouterLienFacebook = $this->executerRequete($sql, array('lien' => $lien, 'id' => $id));
  }




}
