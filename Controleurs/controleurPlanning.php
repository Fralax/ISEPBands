<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/evenements.php';
  require_once 'Modeles/groupes.php';

  class controleurPlanning{

    public function affichagePlanning(){
      $groupe = new groupes();
      $afficherMesGroupes = $groupe->afficherMesGroupes($_SESSION['id'])->fetchAll();
      $vue = new Vue('Planning');
      $vue->generer(array('mesGroupes' => $afficherMesGroupes));
    }

    public function creationEvenement(){
      $event = new evenements();
      $groupe = $_POST['groupe'];
      $debut = $_POST['start'];
      $fin = $_POST['end'];

      $event->creerEvenement($groupe, $debut, $fin);
    }

    public function recuperationEvenements(){
      $event = new evenements();

      $evenements = json_encode($event->afficherEvenements()->fetchAll());
      echo $evenements;
    }

    public function recuperationEvenementsMesGroupes(){
      $event = new evenements();

      $evenements = json_encode($event->afficherEvenementsMesGroupes($_SESSION['id'])->fetchAll());
      echo $evenements;
    }

    public function recuperationEvenementsAutresGroupes(){
      $event = new evenements();

      $evenements = json_encode($event->afficherEvenementsAutresGroupes($_SESSION['id'])->fetchAll());
      echo $evenements;
    }

    public function modificationEvenement(){
      $id = $_POST['id'];
      $debut = $_POST['start'];
      $fin = $_POST['end'];
      $event = new evenements();

      $event->modifierEvenement($id, $debut, $fin);   
    }

    public function suppressionEvenement(){
      $id = $_POST['id'];
      $event = new evenements();

      $event->supprimerEvenement($id);   
    }
  }

?>
