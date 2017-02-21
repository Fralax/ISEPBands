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
      $membresAdministrateurs = $user -> afficherMembresAdministrateurs()->fetchAll();

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

      if (isset($_POST['boutonSupprimerMembre'])) {

        $user = new utilisateurs();
        $group = new groupes();

        $membreASupprimer = $_POST['membreASupprimer'];
        //on supprime les groupes auquel il appartient
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
      $vue->generer(array('membresNonBannis' => $membresNonBannis, 'membresBannis' => $membresBannis, 'membresNonValides' => $membresNonValides, 'membresASupprimer' => $membresASupprimer, 'membresAdministrateurs' => $membresAdministrateurs));

    }


    public function verificationAdmin(){

      $user = new utilisateurs();
      $verificationAdmin = $user->verifierAdmin($_SESSION['id'])->fetch();

      if ($verificationAdmin[0] == "1") {
        return true;
      }

    }





}
