<?php
  require_once 'Modeles/utilisateurs.php';
  require_once 'Modeles/groupes.php';
  require_once 'Modeles/actualites.php';
  require_once 'Vues/vue.php';

  class controleurAccueil{

    public function affichageAccueil(){
      $user = new utilisateurs();
      $groupe = new groupes();
      $actu = new actualites();
      $date = $actu->recupererDateHeureAction();
      $afficherInvitations = $user->afficherInvitations($_SESSION['id'])->fetchAll();
      $actualites = $actu->recupererActualites(0)->fetchAll();

      if (isset($_POST['accepterInvitation'])) {
        $groupe->ajouterAppartient($_SESSION['id'], $_POST['groupe']);
        $user->supprimerMembreInvitation($_SESSION['id'], $_POST['groupe']);
        $prenomNomUser = $user->recupererMembreById($_SESSION['id'])->fetch();
        $actu->insererActuTypeGroupeUtilisateurDate("rejoindreGroupe", $_SESSION['id'], $prenomNomUser['u_prenom'], $prenomNomUser['u_nom'], $_POST['groupe'], $date);
        header("Location: groupe/".urlencode($_POST['groupe']));
      }

      if (isset($_POST['refuserInvitation'])) {
        $user->supprimerMembreInvitation($_SESSION['id'], $_POST['groupe']);
        header("Location: accueil");
      }

      $vue = new Vue('Accueil');
      $vue->generer(array("invitations" => $afficherInvitations, "actus" => $actualites));
    }

    public function chargementActualites(){
      $actu = new actualites();
      $actualites = $actu->recupererActualites($_POST['offset'])->fetchAll();
      echo json_encode($actualites);
    }

  }

?>
