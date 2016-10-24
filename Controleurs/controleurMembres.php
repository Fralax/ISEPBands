<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurMembres{

    public function affichageProfil(){
      $user = new utilisateurs();
      $ajouterInstrumentPratique = $_POST['ajouterInstrumentPratique'];
      $instrumentPratique = $_POST['instrument'];
      $niveau = $_POST['niveau'];
      $annees = $_POST['annees'];
      $afficherInstrumentsNonJoues = $user->afficherInstrumentsNonJoues($_GET['id'])->fetchAll();
      $afficherInstrumentsJoues = $user->afficherInstrumentsJoues($_GET['id'])->fetchAll();
      $afficherInfosMembre = $user->afficherInfosMembre($_GET['id'])->fetch();

      if (isset($ajouterInstrumentPratique)) {
        $user->pratiquerInstrument($_SESSION['id'], $instrumentPratique, $niveau, $annees);
        header("Location: index.php?page=profil&id=".$_SESSION['id']);
      }

      $vue = new Vue('Profil');
      $vue->generer(array("intrumentsNonJoues" => $afficherInstrumentsNonJoues, "instrumentsJoues" => $afficherInstrumentsJoues, "infos" => $afficherInfosMembre));
    }

    public function verificationValide(){
      $user = new utilisateurs();
      $verificationValide = $user->verifierValide($_SESSION['id'])->fetch();
      if ($verificationValide[0] == "1") {
        return true;
      }
    }

    public function verificationSession(){
      if (isset($_SESSION['id'])) {
        return true;
      }
    }

  }

?>
