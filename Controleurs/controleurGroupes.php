<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/groupes.php';

  class controleurGroupes{


    public function creationGroupe(){
      $group = new groupe();
      $id = $_SESSION['id'];
      $nomGroupe = $_POST['nomGroupe'];

      $group->creerGroupe($id, $nomGroupe);

    }
  }
