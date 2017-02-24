<?php

  require_once 'Controleurs/controleurAccueil.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Controleurs/controleurConnexion.php';
  require_once 'Controleurs/controleurMembres.php';
  require_once 'Controleurs/controleurGroupes.php';
  require_once 'Controleurs/controleurAdmin.php';
  require_once 'Controleurs/controleurPlanning.php';

  class routeur{

    private $controleurAccueil;
    private $controleurInscription;
    private $controleurConnexion;
    private $controleurMembres;
    private $controleurGroupes;
    private $controleurAdmin;
    private $controleurPlanning;

    public function __construct(){
      $this->controleurAccueil = new controleurAccueil();
      $this->controleurInscription = new controleurInscription();
      $this->controleurconnexion = new controleurConnexion();
      $this->controleurMembres = new controleurMembres();
      $this->controleurGroupes = new controleurGroupes();
      $this->controleurAdmin = new controleurAdmin();
      $this->controleurPlanning = new controleurPlanning();

      session_start();

    }

    public function routerRequete(){
      $routeur = new routeur();
      //error_reporting(0);
      switch($_GET['page']){

        case 'accueil':
          $this->controleurAccueil->affichageAccueil();
          break;

        case 'annuaire':
          switch ($_GET['annuaire']) {
            case 'groupes':
              $this->controleurGroupes->affichageGroupes();
              break;

            case 'membres':
              $this->controleurMembres->affichageMembres();
              break;
          }
          break;

        case 'profil':
          $this->controleurMembres->affichageProfil();
          break;

        case 'mesgroupes':
          $this->controleurGroupes->affichageMesGroupes();
          break;

        case 'groupe':
          $this->controleurGroupes->affichageGroupe();
          break;

        case 'administration':
          $this->controleurAdmin->affichageAdmin();
          break;

        case 'planning':
          $this->controleurPlanning->affichagePlanning();
          break;

        case 'evenements':
          $this->controleurPlanning->recuperationEvenements();
          break;

        case 'sendevenement':
          $this->controleurPlanning->modificationEvenement();
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
