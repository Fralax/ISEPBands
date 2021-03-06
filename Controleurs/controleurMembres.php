<?php

  require_once 'Vues/vue.php';
  require_once 'Modeles/utilisateurs.php';

  class controleurMembres{

    public function affichageProfil(){
      $user = new utilisateurs();
      $groupe = new groupes();
      $ajouterInstrumentPratique = $_POST['ajouterInstrumentPratique'];
      $instrumentPratique = $_POST['instrument'];
      $boutonModifierInstrument = $_POST['boutonModifierInstrument'];
      $boutonsupprimerInstrumentPratique = $_POST['boutonsupprimerInstrumentPratique'];
      $changerPhoto = $_POST['changerPhoto'];
      $niveau = $_POST['niveau'];
      $annees = $_POST['annees'];
      $afficherInstrumentsNonJoues = $user->afficherInstrumentsNonJoues($_GET['id'])->fetchAll();
      $afficherInstrumentsJoues = $user->afficherInstrumentsJoues($_GET['id'])->fetchAll();
      $afficherInfosMembre = $user->afficherInfosMembre($_GET['id'])->fetch();
      $afficherMesGroupes = $groupe->afficherMesGroupes($_GET['id'])->fetchAll();


      if (isset($ajouterInstrumentPratique)) {
        $user->pratiquerInstrument($_SESSION['id'], $instrumentPratique, $niveau, $annees);
        header("Location: profil/".$_SESSION['id']);
      }

      if (isset($boutonModifierInstrument)) {
        $user->modifierInstrument($_SESSION['id'], $_POST['modifierInstrument'], $_POST['modifierNiveau'], $_POST['modifierAnnees']);
        header("Location: profil/".$_SESSION['id']);
      }

      if (isset($boutonsupprimerInstrumentPratique)) {
        $user->supprimerInstrumentPratique($_SESSION['id'], $_POST['modifierInstrument']);
        var_dump($_POST['boutonsupprimerInstrumentPratique']);
        header("Location: profil/".$_SESSION['id']);
      }

      if (isset($_POST['boutonLienFacebook']) && $_POST['lienFacebook'] != "") {
        $user->ajouterLienFacebook($_SESSION['id'], $_POST['lienFacebook']);
        header("Location: profil/".$_SESSION['id']);
      }

      if (isset($changerPhoto)) {
        if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
          $tailleMax = 2097152;
          $extensions = array('png', 'gif', 'jpg', 'jpeg');
          $extension = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
          if ($_FILES['avatar']['size'] <= $tailleMax) {
            if(in_array($extension, $extensions)){
              $photo = "avatars/".$_SESSION['id'].".".$extension;
              if (move_uploaded_file($_FILES['avatar']['tmp_name'], $photo)) {
                $modifierPhoto = $user->modifierPhoto($_SESSION['id'], $photo);
                header("Location: profil/".$_SESSION['id']);
              } else{
                ?> <script>alert("Echec de l'upload !")</script><?php
              }
            } else{
              ?> <script>alert("Vous devez uploader un fichier de type png, gif, jpg ou jpeg ...")</script><?php
            }
          } else{
            ?> <script>alert("Votre photo de profil ne doit pas dépasser 2 Mo !")</script><?php
          }
        } else{

          ?> <script>alert("Echec de l'upload !")</script><?php
        }
      }

      $vue = new Vue('Profil');
      $vue->generer(array("intrumentsNonJoues" => $afficherInstrumentsNonJoues, "instrumentsJoues" => $afficherInstrumentsJoues, "infos" => $afficherInfosMembre, "groupes" => $afficherMesGroupes));
    }

    public function affichagePage404(){
      $vue = new Vue('404');
      $vue->generer();
    }

    public function verificationMembreValide(){
      $user = new utilisateurs();
      $verificationValide = $user->verifierValide($_SESSION['id'])->fetch();
      if ($verificationValide[0] == "1") {
        return true;
      }
    }

    public function verificationSessionExiste(){
      if (isset($_SESSION['id'])) {
        return true;
      }
    }

    public function verificationSessionValide(){
      if ($_SESSION['id'] == $_GET['id']) {
        return true;
      }
    }

    public function affichageMembres(){
      $user = new utilisateurs();
      $affichageMembres = $user->afficherMembres()->fetchAll();
      $vue = new Vue('AnnuaireMembres');
      $vue->generer(array('membres' => $affichageMembres));
    }

    public function verificationMembreBanni($id){

      $user = new utilisateurs();
      $verificationBanni = $user->verifierBanni($id)->fetch();

      if ($verificationBanni[0]) {
        return true;
      }

    }

}

?>
