<?php

  require_once 'Controleurs/controleurAccueil.php';
  require_once 'Controleurs/controleurAnnuaire.php';
  require_once 'Controleurs/controleurInscription.php';

  class routeur{

    private $controleurAccueil;

    public function __construct(){
      $this->controleurAccueil = new accueil();
      $this->controleurAnnuaire = new annuaire();
      $this->controleurInscription = new inscription();
      session_start();
    }

    public function routerRequete(){
      $routeur = new routeur();

      switch($_GET['page']){

        case 'accueil':
          $this->controleurAccueil->affichageAccueil();
          break;

        case 'annuaire':
          $this->controleurAnnuaire->affichageAnnuaire();
          break;

        case 'inscription':
            $this->controleurInscription->affichageInscription();
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
