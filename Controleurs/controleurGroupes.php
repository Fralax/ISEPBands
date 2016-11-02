<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/groupes.php';

  class controleurGroupes{

    public function affichageMesGroupes(){
      $id = $_SESSION['id'];
      $groupes = new groupes();
      $mesGroupes = $groupes -> afficherMesGroupes($id) -> fetchAll();
      $membresMesGroupes = array();
      foreach ($mesGroupes as list($nomGroupe)){
        $membresGroupes = $groupes -> afficherMembresGroupes($nomGroupe) -> fetchAll();
        array_push($membresMesGroupes, $membresGroupes);
      }
      $vue = new Vue('MesGroupes');
      $vue->generer(array("groupes" => $mesGroupes, "listeMembres" => $membresMesGroupes));
    }

    public function creationGroupe(){
      $groupes = new groupes();
      $id = $_SESSION['id'];
      $nomGroupe = $_POST['nomGroupe'];

      if (isset($_POST['creerGroupe'])) {
        $groupes -> creerGroupe($id, $nomGroupe);
        $groupes -> ajouterAppartient($id, $nomGroupe);
      }


    }
  }
