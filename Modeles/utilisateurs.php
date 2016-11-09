<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function verifierEmail($email){
    $sql = 'SELECT u_email FROM utilisateur WHERE u_email = :email';
    $resultatEmail = $this->executerRequete($sql, array( 'email' => $email));
    return $resultatEmail;
  }


  public function inscrireUtilisateur($prenom, $nom, $email, $mdp, $portable, $promo, $dateInscription, $valide, $photo, $facebook){
    $sql = 'INSERT INTO utilisateur (u_prenom, u_nom, u_email, u_mdp, u_portable, u_promo, u_dateInscription, u_valide, u_photo, u_facebook) VALUES (:prenom, :nom, :email, :mdp, :portable, :promo, :dateInscription, :valide, :photo, :facebook)';

    $inscrireUtilisateur = $this->executerRequete($sql, array(
      'prenom' => $prenom,
      'nom' => $nom,
      'email' => $email,
      'mdp' => $mdp,
      'portable' => $portable,
      'promo' => $promo,
      'dateInscription' => $dateInscription,
      'valide' => $valide,
      'photo' => $photo,
      'facebook' => $facebook
    ));
  }


  public function verifierMdp($email){
    $sql = 'SELECT u_mdp, u_email, u_prenom, u_id, u_valide FROM utilisateur WHERE u_email = :email';
    $resultatMdp = $this->executerRequete($sql, array(
      'email' => $email
    ));
    return $resultatMdp;
  }

  public function recupererID($email){
    $sql = 'SELECT u_id FROM utilisateur WHERE u_email = :email';
    $recupererID = $this->executerRequete($sql, array(
      'email' => $email
    ));
    return $recupererID;
  }


  public function pratiquerInstrument($id, $instrument, $niveau, $annees){
    $sql = 'INSERT INTO pratique (u_id, p_instrument, p_niveau, p_annees) VALUES (:id, :instrument, :niveau, :annees)';
    $ajouterInstrument = $this->executerRequete($sql, array(
      'id' => $id,
      'instrument' => $instrument,
      'niveau' => $niveau,
      'annees' => $annees));
  }

  public function modifierInstrument($id, $instrument, $niveau, $annees){
    $sql = 'UPDATE pratique SET p_niveau = :niveau, p_annees = :annees WHERE u_id = :id AND p_instrument = :instrument';
    $modifierInstrument = $this->executerRequete($sql, array(
      'id' => $id,
      'instrument' => $instrument,
      'niveau' => $niveau,
      'annees' => $annees
    ));
  }

  public function supprimerInstrument($id, $instrument){
    $sql = 'DELETE FROM pratique WHERE u_id = :id AND p_instrument = :instrument';
    $supprimerInstrument = $this->executerRequete($sql, array(
      'id' => $id,
      'instrument' => $instrument
    ));
  }


  public function afficherInstrumentsNonJoues($id){
    $sql = 'SELECT i_instrument FROM instrument WHERE i_instrument NOT IN (SELECT p_instrument FROM pratique WHERE u_id= :id)';
    $afficherInstrumentsNonJoues = $this->executerRequete($sql, array(
      'id' => $id
    ));
    return $afficherInstrumentsNonJoues;
  }

  public function afficherInstrumentsJoues($id){
    $sql = 'SELECT p_instrument, p_niveau, p_annees FROM pratique WHERE u_id = :id ORDER BY p_annees DESC';
    $afficherInstrumentsJoues = $this->executerRequete($sql, array(
      'id' => $id
    ));
    return $afficherInstrumentsJoues;
  }

  public function verifierValide($id){
    $sql = 'SELECT u_valide FROM utilisateur WHERE u_id = :id';
    $recupererValide = $this->executerRequete($sql, array(
      'id' => $id
    ));
    return $recupererValide;
  }

  public function afficherInfosMembre($id){
    $sql = 'SELECT u_prenom, u_nom, u_email, u_mdp, u_portable, u_promo, u_dateInscription, u_valide, u_photo, u_facebook FROM utilisateur WHERE u_id = :id';
    $afficherMesInfos = $this->executerRequete ($sql, array(
      'id' => $id
    ));
    return $afficherMesInfos;
  }

  public function modifierPhoto($id, $photo){
    $sql = 'UPDATE utilisateur SET u_photo = :photo WHERE u_id = :id';
    $modifierPhoto = $this->executerRequete ($sql, array(
      'photo' => $photo,
      'id' => $id
    ));
  }

  public function ajouterLienFacebook($id, $lien){
    $sql = 'UPDATE utilisateur SET u_facebook = :lien WHERE u_id = :id';
    $ajouterLienFacebook = $this->executerRequete($sql, array(
      'lien' => $lien,
      'id' => $id
    ));
  }

  public function afficherMembresGroupe($nomGroupe){
    $sql = 'SELECT u_id, u_prenom, u_nom, u_photo FROM appartient NATURAL JOIN utilisateur WHERE g_nom = :nomGroupe';
    $verifierAppartientGroupe = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
    return $verifierAppartientGroupe;
  }

  public function verifierCreateurGroupe($nomGroupe){
    $sql = 'SELECT g_createur FROM groupe WHERE g_nom = :nomGroupe';
    $verifierCreateurGroupe = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
    return $verifierCreateurGroupe;
  }

  public function inviterMembreGroupe($idCreateur, $idInvite, $nomGroupe){
    $sql = 'INSERT INTO invitation (g_createur, u_id, g_nom) VALUES (:idCreateur, :idInvite, :nomGroupe)';
    $inviterMembreGroupe = $this->executerRequete($sql, array(
      'idCreateur' => $idCreateur,
      'idInvite' => $idInvite,
      'nomGroupe' => $nomGroupe
    ));
  }

  public function afficherMembresInvites($nomGroupe){
    $sql = 'SELECT u_id, u_prenom, u_nom, u_photo FROM utilisateur WHERE u_id IN (SELECT u_id FROM invitation WHERE g_nom = :nomGroupe)';
    $afficherMembresInvites = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
    return $afficherMembresInvites;
  }

  public function afficherMembresNonInvites($nomGroupe){
    $sql = 'SELECT u_id, u_prenom, u_nom FROM utilisateur WHERE u_id NOT IN (SELECT u_id FROM invitation WHERE g_nom = :nomGroupe) AND u_id NOT IN (SELECT u_id FROM appartient WHERE g_nom = :nomGroupe) ORDER BY u_nom';
    $afficherMembresNonInvites = $this->executerRequete($sql, array(
      'nomGroupe' => $nomGroupe
    ));
    return $afficherMembresNonInvites;
  }

  public function afficherMembres(){
    $sql = 'SELECT u_id, u_prenom, u_nom, u_photo FROM utilisateur';
    $afficherMembres = $this->executerRequete($sql);
    return $afficherMembres;
  }

  public function afficherMembresASupprimer($nomGroupe, $idCreateur){
    $sql = 'SELECT u_id, u_prenom, u_nom FROM utilisateur WHERE u_id != :idCreateur AND (u_id IN (SELECT u_id FROM appartient WHERE g_nom = :nomGroupe) OR u_id IN (SELECT u_id FROM invitation WHERE g_nom = :nomGroupe))';
    $afficherMembresASupprimer = $this->executerRequete($sql, array(
      'idCreateur' => $idCreateur,
      'nomGroupe' => $nomGroupe
    ));
    return $afficherMembresASupprimer;
  }

  public function supprimerMembreGroupe($membre, $nomGroupe){
    $sql = 'DELETE FROM appartient WHERE u_id = :membre AND g_nom = :nomGroupe';
    $supprimerMembreGroupe = $this->executerRequete($sql, array(
      'membre' => $membre,
      'nomGroupe' => $nomGroupe
    ));
  }

  public function supprimerMembreInvitation($membre, $nomGroupe){
    $sql = 'DELETE FROM invitation WHERE u_id = :membre AND g_nom = :nomGroupe';
    $supprimerMembreGroupe = $this->executerRequete($sql, array(
      'membre' => $membre,
      'nomGroupe' => $nomGroupe
    ));
  }


}
