<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/groupes.php';

  class controleurGroupes{


    public function creationGroupe(){
      $groupe = new groupe();
      $id = $_SESSION['id'];
      $nomGroupe = $_POST['nomGroupe'];

      if (isset($_POST['creeGroupe'])) {
        $groupe->creerGroupe($id, $nomGroupe);
        $groupe->ajouterAppartient($id, $nomGroupe);
      }

    }
  }
//TEST pour commit le bon dossier chez moi
