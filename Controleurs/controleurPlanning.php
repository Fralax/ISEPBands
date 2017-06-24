<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/evenements.php';
  require_once 'Modeles/groupes.php';
  require_once 'Modeles/actualites.php';

  class controleurPlanning{

    public function affichagePlanning(){
      $groupe = new groupes();
      $afficherMesGroupes = $groupe->afficherMesGroupes($_SESSION['id'])->fetchAll();
      $vue = new Vue('Planning');
      $vue->generer(array('mesGroupes' => $afficherMesGroupes));
    }

    public function creationEvenement(){
      $actu = new actualites();
      $event = new evenements();
      $groupe = $_POST['groupe'];
      $debut = $_POST['start'];
      $fin = $_POST['end'];
      $date = $actu->recupererDateHeureAction();

      $actu->insererActuTypeGroupeDebutFinDate("creationEvenement", $_POST['groupe'], $_POST['start'], $_POST['end'], $date);
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
      $actu = new actualites();
      $event = new evenements();
      $groupe = $_POST['groupe'];
      $id = $_POST['id'];
      $debut = $_POST['start'];
      $fin = $_POST['end'];
      $date = $actu->recupererDateHeureAction();

      $dateEvenement = $event->recupererDateEvenement($id)->fetch();
      $actu->insererActuTypeGroupeDebutFinDate("suppressionEvenement", $groupe, $dateEvenement['start'], $dateEvenement['end'], $date);
      $event->modifierEvenement($id, $debut, $fin);
      $actu->insererActuTypeGroupeDebutFinDate("creationEvenement", $groupe, $_POST['start'], $_POST['end'], $date);
    }

    public function suppressionEvenement(){
      $actu = new actualites();
      $event = new evenements();
      $groupe = $_POST['groupe'];
      $id = $_POST['id'];
      $date = $actu->recupererDateHeureAction();

      $dateEvenement = $event->recupererDateEvenement($id)->fetch();
      $actu->insererActuTypeGroupeDebutFinDate("suppressionEvenement", $groupe, $dateEvenement['start'], $dateEvenement['end'], $date);
      $event->supprimerEvenement($id);
    }
  }

?>
