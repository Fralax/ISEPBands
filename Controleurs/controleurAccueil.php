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

      if (isset($_POST['accepterInvitation'])) {
        $groupe->ajouterAppartient($_SESSION['id'], $_POST['groupe']);
        $user->supprimerMembreInvitation($_SESSION['id'], $_POST['groupe']);
        $actu->insererActuTypeGroupeUtilisateurDate("rejoindreGroupe", $_SESSION['id'], $_POST['groupe'], $date);
        header("Location: index.php?page=groupe&groupe=".urlencode($_POST['groupe']));
      }

      if (isset($_POST['refuserInvitation'])) {
        $user->supprimerMembreInvitation($_SESSION['id'], $_POST['groupe']);
        header("Location: index.php?page=accueil");
      }

      $vue = new Vue('Accueil');
      $vue->generer(array("invitations" => $afficherInvitations));
    }

  }

?>
