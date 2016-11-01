<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/groupes.php';

  class controleurGroupes{

    public function affichageMesGroupes(){
      $id = $_SESSION['id'];
      $groupe = new groupe();
      $mesGroupes = $groupe -> afficherMesGroupes($id) -> fetchAll();
      $membresMesGroupes = array();
      foreach ($mesGroupes as list($nomGroupe)) {
        $membresGroupes = $groupe -> afficherMembresGroupes($nomGroupe);
        array_push($membresMesGroupes, $membresGroupes);
      }
      $vue = new Vue('MesGroupes');
      $vue->generer(array("groupes" => $mesGroupes, "listeMembres" => $membresMesGroupes));
    }

    public function creationGroupe(){
      $groupe = new groupe();
      $id = $_SESSION['id'];
      $nomGroupe = $_POST['nomGroupe'];

      if (isset($_POST['creeGroupe'])) {
        $groupe -> creerGroupe($id, $nomGroupe);
        $groupe -> ajouterAppartient($id, $nomGroupe);
      }


    }
  }
