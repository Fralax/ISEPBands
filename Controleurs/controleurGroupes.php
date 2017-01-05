<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/groupes.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurGroupes{

    public function verificationCreateurGroupe(){
      $user = new utilisateurs();
      $verifierCreateurGroupe = $user->verifierCreateurGroupe($_GET['groupe'])->fetch();
      if ($verifierCreateurGroupe[0] == $_SESSION['id']) {
        return true;
      }
    }

    public function affichageGroupe(){
      $user = new utilisateurs();
      $groupe = new groupes();

      $membresGroupe = $user->afficherMembresGroupe($_GET['groupe'])->fetchAll();
      $afficherMembresNonInvites = $user->afficherMembresNonInvites($_GET['groupe'])->fetchAll();
      $afficherMembresInvites = $user->afficherMembresInvites($_GET['groupe'])->fetchAll();
      $afficherMembresASupprimer = $user->afficherMembresASupprimer($_GET['groupe'], $_SESSION['id'])->fetchAll();
      $afficherAutresMembres = $user->afficherAutresMembres($_GET['groupe'], $_SESSION['id'])->fetchAll();
      $afficherPhotoGroupe = $groupe->afficherPhotoGroupe($_GET['groupe'])->fetch();
      $afficherPlaylist = $groupe->afficherPlaylist($_GET['groupe'])->fetchAll();

      if (isset($_POST['inviterMembre'])){
        $inviterMembreGroupe = $user -> inviterMembreGroupe($_SESSION['id'], $_POST['membresInvites'], $_GET['groupe']);
        header("Location: index.php?page=groupe&groupe=".urlencode($_GET['groupe']));
      }

      if (isset($_POST['supprimerMembre'])) {
        $supprimerMembreGroupe = $user->supprimerMembreGroupe($_POST['membres'], $_GET['groupe']);
        $supprimerMembreInvitation = $user->supprimerMembreInvitation($_POST['membres'], $_GET['groupe']);
        header("Location: index.php?page=groupe&groupe=".urlencode($_GET['groupe']));
      }

      if (isset($_POST['modifierNom'])){
        if ($_POST['nouveauNom1'] == $_POST['nouveauNom2']){
          $modiferNomGroupe = $groupe->modifierNomGroupe($_GET['groupe'],$_POST['nouveauNom1']);
          $modifierNomGroupeAppartient = $groupe->modifierNomGroupeAppartient($_GET['groupe'], $_POST['nouveauNom1']);
          $modiferNomGroupeInvitation = $groupe->modifierNomGroupeInvitation($_GET['groupe'],$_POST['nouveauNom1']);
          header("Location: index.php?page=groupe&groupe=".urlencode($_POST['nouveauNom1']));
        }
      }

      if (isset($_POST['changerPhotoGroupe'])) {
        if (isset($_FILES['photoGroupe']) && !empty($_FILES['photoGroupe']['name'])) {
          $tailleMax = 10485760;
          $extensions = array('png', 'gif', 'jpg', 'jpeg');
          $extension = strtolower(substr(strrchr($_FILES['photoGroupe']['name'], '.'), 1));
          if ($_FILES['photoGroupe']['size'] <= $tailleMax) {
            if(in_array($extension, $extensions)){
              $photo = str_replace(" ", "", "photosGroupes/".$_GET['groupe'].".".$extension);
              if (move_uploaded_file($_FILES['photoGroupe']['tmp_name'], $photo)) {
                $modifierPhoto = $groupe->modifierPhotoGroupe($_GET['groupe'], $photo);
                header("Location: index.php?page=groupe&groupe=".urlencode($_GET['groupe']));
              } else{
                ?> <script>alert("Echec de l'upload !")</script><?php
              }
            } else{
              ?> <script>alert("Vous devez uploader un fichier de type png, gif, jpg ou jpeg ...")</script><?php
            }
          } else{
            ?> <script>alert("La photo du groupe ne doit pas dépasser 10 Mo !")</script><?php
          }
        } else{
          ?> <script>alert("Echec de l'upload !")</script><?php
        }
      }

      if (isset($_POST['supprimerGroupe'])) {
        $supprimerGroupe = $groupe->supprimerGroupe($_GET['groupe']);
        $supprimerGroupeAppartient = $groupe->supprimerGroupeAppartient($_GET['groupe']);
        $supprimerGroupeInvitation = $groupe->supprimerGroupeInvitation($_GET['groupe']);
        header("Location: index.php?page=mesgroupes");
      }

      if (isset($_POST['quitterGroupe'])) {
        $user->supprimerMembreGroupe($_SESSION['id'], $_GET['groupe']);
        header("Location: index.php?page=mesgroupes");
      }

      if (isset($_POST['changerChefGroupe'])) {
        $user->modifierChefGroupe($_GET['groupe'], $_POST['membresChefGroupe']);
        header("Location: index.php?page=groupe&groupe=".urlencode($_GET['groupe']));
      }

      if (isset($_POST['ajouterMorceau'])) {
        if (!empty($_POST['nomMorceau']) && !empty($_POST['nomArtiste'])) {
          $groupe->ajouterChanson($_GET['groupe'], $_POST['nomMorceau'], $_POST['nomArtiste']);
          header("Location: index.php?page=groupe&groupe=".urlencode($_GET['groupe']));
        } else{
          ?> <script> alert("Des champs n'ont pas été remplis !") </script> <?php
        }
      }

      if (isset($_POST['boutonSupprimerMorceau'])) {
        $groupe->supprimerChanson($_GET['groupe'], $_POST['supprimerMorceau'], $_POST['supprimerArtiste']);
        header("Location: index.php?page=groupe&groupe=".urlencode($_GET['groupe']));
      }

      $vue = new Vue('Groupe');
      $vue->generer(array("membresNonInvites" => $afficherMembresNonInvites, "membresInvites" => $afficherMembresInvites, 'membres' => $membresGroupe, "membresASupprimer" => $afficherMembresASupprimer, "photoGroupe" => $afficherPhotoGroupe, "autresMembres" => $afficherAutresMembres, 'morceaux' => $afficherPlaylist));
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
        $groupes -> creerGroupe($id, $nomGroupe, "photosGroupes/groupe.jpg");
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
