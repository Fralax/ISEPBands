<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';
  require_once 'Modeles/groupes.php';

  class controleurAdmin{

    public function affichageAdmin(){

      $user = new utilisateurs();
      $group = new groupes();
      $membresNonBannis = $user -> afficherMembresNonBannis()->fetchAll();
      $membresBannis = $user -> afficherMembresBannis()->fetchAll();
      $membresNonValides = $user -> afficherMembresNonValides()->fetchAll();
      $membresASupprimer = $user -> afficherMembresASupprimer($_SESSION['id'])->fetchAll();
      $membresAdministrateurs = $user -> afficherMembresAdministrateurs($_SESSION['id'])->fetchAll();
      $groupes = $group -> afficherGroupes()->fetchAll();
      $instruments = $user -> afficherInstruments()->fetchAll();

      if(isset($_POST['boutonBannirMembre'])){
        $user->bannirMembre($_POST['membreABannir']);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonDebannirMembre'])) {
        $user->debannirMembre($_POST['membreADebannir']);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonValiderMembre'])) {
        $user->validerMembre($_POST['membreAValider']);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonNommerAdministrateur'])) {
        $user->nommerMembreAdministrateur($_POST['membreANommerAdministrateur']);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonSupprimerAdministrateur'])) {
        $user->supprimerMembreAdministrateur($_POST['membreASupprimerAdministrateur']);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonSupprimerGroupe'])) {
        $groupeASupprimer = $_GET['groupeASupprimer'];
        $supprimerGroupe = $groupe->supprimerGroupe($groupeASupprimer);
        $supprimerGroupeAppartient = $groupe->supprimerGroupeAppartient($groupeASupprimer);
        $supprimerGroupeInvitation = $groupe->supprimerGroupeInvitation($groupeASupprimer);
        $supprimerGroupeJoue = $groupe->supprimerGroupeJoue($groupeASupprimer);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonAjouterInstrument'])) {
        if (isset($_FILES['photoInstrument']) && !empty($_FILES['photoInstrument']['name'])) {
          $tailleMax = 10485760;
          $extensions = array('png');
          $extension = strtolower(substr(strrchr($_FILES['photoInstrument']['name'], '.'), 1));
          if ($_FILES['photoInstrument']['size'] <= $tailleMax) {
            if(in_array($extension, $extensions)){
              $photo = 'Autres/'.$_POST['nomInstrument'].'.'.$extension;
              if (move_uploaded_file($_FILES['photoInstrument']['tmp_name'], $photo)) {
                $ajouterInstrument = $user->ajouterInstrument($_POST['nomInstrument']);
                header("Location: index.php?page=administration");
              } else{
                ?> <script>alert("Echec de l'upload !")</script><?php
              }
            } else{
              ?> <script>alert("Vous devez uploader un fichier de type png ...")</script><?php
            }
          } else{
            ?> <script>alert("La photo de l'instrument ne doit pas dépasser 10 Mo !")</script><?php
          }
        } else{
          ?> <script>alert("Echec de l'upload !")</script><?php
        }
      }


      if (isset($_POST['boutonSupprimerInstrument'])){
        $user = new utilisateurs();
        $instrumentASupprimer = $_POST['instrumentASupprimer'];
        $supprimerInstrument = $user -> supprimerInstrument($instrumentASupprimer);
        $supprimerInstrumentAdminPratique = $user -> supprimerInstrumentAdminPratique($instrumentASupprimer);
        $supprimerPhoto = unlink('Autres/'.$instrumentASupprimer.'.png');
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonSupprimerMembre'])) {

        $user = new utilisateurs();
        $group = new groupes();

        $membreASupprimer = $_POST['membreASupprimer'];
        $mesGroupes = $group -> afficherMesGroupes($membreASupprimer) -> fetchAll();
        foreach($mesGroupes as list($nomGroupe)){
          $supprimerGroupe = $group -> supprimerGroupe($nomGroupe);
          $supprimerGroupeAppartient = $group -> supprimerGroupeAppartient($nomGroupe);
          $supprimerGroupeInvitation = $group -> supprimerGroupeInvitation($nomGroupe);
          $supprimerGroupeJoue = $group -> supprimerGroupeJoue($nomGroupe);
        }

        $supprimerTousInstrumentsJoues = $user -> supprimerTousInstrumentsJoues($membreASupprimer);
        $debannirMembre = $user -> debannirMembre($membreASupprimer);
        $supprimerUtilisateur = $user -> supprimerUtilisateur($membreASupprimer);
        header("Location: index.php?page=administration");
      }

      $vue = new Vue('Admin');
      $vue->generer(array('instruments' => $instruments, 'membresNonBannis' => $membresNonBannis, 'membresBannis' => $membresBannis, 'membresNonValides' => $membresNonValides, 'membresASupprimer' => $membresASupprimer, 'membresAdministrateurs' => $membresAdministrateurs, 'groupes' => $groupes));

    }


    public function verificationAdmin(){

      $user = new utilisateurs();
      $verificationAdmin = $user->verifierAdmin($_SESSION['id'])->fetch();

      if ($verificationAdmin[0] == "1") {
        return true;
      }

    }





}
