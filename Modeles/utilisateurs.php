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


}
