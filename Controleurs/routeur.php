<?php

  require_once 'Controleurs/controleurAccueil.php';

  class routeur{

    private $controleurAccueil;

    public function __construct(){
      $this->controleurAccueil = new accueil();
      session_start();
    }

    public function routerRequete(){
      $routeur = new routeur();

      switch($_GET['page']){

        case 'accueil':
          $this->controleurAccueil->affichageAccueil();
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
