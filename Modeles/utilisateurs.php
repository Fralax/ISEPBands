<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function verifierEmail($email){
    $sql = 'SELECT u_email FROM utilisateur WHERE u_email = :email';
    $resultatEmail = $this->executerRequete($sql, array( 'email' => $email));
    return $resultatEmail;
  }


  public function inscrireUtilisateur($prenom, $nom, $email, $mdp, $portable, $promo, $dateInscription, $valide){
    $sql = 'INSERT INTO utilisateur (u_prenom, u_nom, u_email, u_mdp, u_portable, u_promo, u_dateInscription, u_valide) VALUES (:prenom, :nom, :email, :mdp, :portable, :promo, :dateInscription, :valide)';

    $inscrireUtilisateur = $this->executerRequete($sql, array('prenom' => $prenom, 'nom' => $nom, 'email' => $email, 'mdp' => $mdp, 'portable' => $portable, 'promo' => $promo, 'dateInscription' => $dateInscription, 'valide' => $valide));
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


  public function pratiquerInstrument($email, $instrument, $niveau, $annees){
    $sql = 'INSERT INTO pratique (p_email, p_instrument, p_niveau, p_annees) VALUES (:email, :instrument, :niveau, :annees)';
    $ajouterInstrument = $this->executerRequete($sql, array('email' => $email, 'instrument' => $instrument, 'niveau' => $niveau, 'annees' => $annees));
  }


  public function afficherInstrumentsNonJoues($email){
    $sql = 'SELECT i_instrument FROM instrument WHERE i_instrument NOT IN (SELECT p_instrument FROM pratique WHERE p_email= :email)';
    $afficherInstrumentsNonJoues = $this->executerRequete($sql, array('email' => $email));
    return $afficherInstrumentsNonJoues;
  }

  public function afficherInstrumentsJoues($email){
    $sql = 'SELECT p_instrument, p_niveau, p_annees FROM pratique WHERE p_email = :email ORDER BY p_annees DESC';
    $afficherInstrumentsJoues = $this->executerRequete($sql, array('email' => $email));
    return $afficherInstrumentsJoues;
  }

  public function verifierValide($id){
    $sql = 'SELECT u_valide FROM utilisateur WHERE u_id = :id';
    $recupererValide = $this->executerRequete($sql, array('id' => $id));
    return $recupererValide;
  }

  




}
