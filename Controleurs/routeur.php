<?php

  require_once 'Controleurs/controleurAccueil.php';
  require_once 'Controleurs/controleurAnnuaire.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Controleurs/controleurConnexion.php';

  class routeur{

    private $controleurAccueil;
    private $controleurAnnuaire;
    private $controleurInscription;
    private $controleurConnexion;

    public function __construct(){
      $this->controleurAccueil = new controleurAccueil();
      $this->controleurAnnuaire = new controleurAnnuaire();
      $this->controleurInscription = new controleurInscription();
      $this->controleurconnexion = new controleurConnexion();
      session_start();

    }

    public function routerRequete(){
      $routeur = new routeur();
      error_reporting(0);
      switch($_GET['page']){

        case 'accueil':
          $this->controleurAccueil->affichageAccueil();
          break;

        case 'annuaire':
          $this->controleurAnnuaire->affichageAnnuaire();
          break;

        case 'inscription':
          $this->controleurInscription->inscriptionUtilisateur();
          break;

        case 'inscriptioninstruments':
          $this->controleurInscription->inscriptionUtilisateurInstruments();
          break;

        default:
          $_SESSION = array();
          session_destroy();
          $this->controleurAccueil->affichageAccueil();
          break;
      }
    }

  }

?>
