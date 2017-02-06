<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurAdmin{

    public function affichageAdmin(){

      $user = new utilisateurs();
      $membresNonBannis = $user -> afficherMembresNonBannis()->fetchAll();
      $membresBannis = $user -> afficherMembresBannis()->fetchAll();

      if(isset($_POST['boutonBannirMembre'])){
        $user->bannirMembre($_POST['membreABannir']);
        header("Location: index.php?page=administration");
      }

      if (isset($_POST['boutonDebannirMembre'])) {
        $user->debannirMembre($_POST['membreADebannir']);
        header("Location: index.php?page=administration");
      }

      $vue = new Vue('Admin');
      $vue->generer(array('membresNonBannis' => $membresNonBannis, 'membresBannis' => $membresBannis));

    }


    public function verificationAdmin(){

      $user = new utilisateurs();
      $verificationAdmin = $user->verifierAdmin($_SESSION['id'])->fetch();

      if ($verificationAdmin[0] == "1") {
        return true;
      }

    }





}
