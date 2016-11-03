<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/groupes.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurGroupes{

    public function verificationCreateurGroupe(){
      $user = new utilisateurs();
      $verifierCreateurGroupe = $user->verifierCreateurGroupe($_GET['groupe'])->fetch();
      if ($verifierCreateurGroupe[g_createur] == $_SESSION['id']) {
        return true;
      }
    }

    public function affichageGroupe(){
      $user = new utilisateurs();
      $membresGroupe = $user->afficherMembresGroupe($_GET['groupe'])->fetchAll();
      $afficherMembresNonInvites = $user->afficherMembresNonInvites($_GET['groupe'])->fetchAll();
      $afficherMembresInvites = $user->afficherMembresInvites($_GET['groupe'])->fetchAll();

      $vue = new Vue('Groupe');
      $vue->generer(array("membresNonInvites" => $afficherMembresNonInvites, "membresInvites" => $afficherMembresInvites, 'membres' => $membresGroupe));
    }

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
        header("Location: index.php?page=groupe&groupe=".urlencode($nomGroupe));
      }
    }

    public function affichageGroupes(){
      $groupes = new groupes();
      $affichageGroupes = $groupes->afficherGroupes()->fetchAll();
      $vue = new Vue('AnnuaireGroupes');
      $vue->generer(array('groupes' => $affichageGroupes));
    }

  }
