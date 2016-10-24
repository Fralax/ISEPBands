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
      $afficherInstrumentsNonJoues = $user->afficherInstrumentsNonJoues($_SESSION['email'])->fetchAll();
      $afficherInstrumentsJoues = $user->afficherInstrumentsJoues($_SESSION['email'])->fetchAll();

      if (isset($ajouterInstrumentPratique)) {
        $user->pratiquerInstrument($_SESSION['email'], $instrumentPratique, $niveau, $annees);
        header("Location: index.php?page=profil");
      }

      $vue = new Vue('Profil');
      $vue->generer(array("intrumentsNonJoues" => $afficherInstrumentsNonJoues, "instrumentsJoues" => $afficherInstrumentsJoues));
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
