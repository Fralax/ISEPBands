<?php $this->titre = "Accueil" ?>

<?php

require_once 'Controleurs/controleurMembres.php';
$membre = new controleurMembres();
$verificationSessionExiste = $membre->verificationSessionExiste();

if ($verificationSessionExiste == true) {
  $a = 0;
} else{
  $a = 1;
}

?>

<?php if ($a == 0): ?>
  <div class="container">
    <?php if ($invitations): ?>
      <div class="row row-centered notifications">
        <?php foreach ($invitations as list($id, $prenom, $nom, $photo, $groupe)): ?>
          <div class="invitation">
            <img class="photoMembreNotifications" src="<?php echo $photo ?>" alt="" />
            <strong><a href="index.php?page=profil&amp;id=<?php echo $id ?>"><?php echo $prenom." ".$nom ?></a></strong> vous a invité dans le groupe <strong><a href="index.php?page=groupe&amp;groupe=<?php echo urlencode($groupe) ?>"><?php echo $groupe ?></a></strong>
            <form action="" method="post">
              <input type="hidden" name="groupe" value="<?php echo $instrument ?>">
              <input class="boutonsFormulaires" type="submit" name="accepterInvitation" value="Accepter">
              <input class="boutonsFormulaires" type="submit" name="refuserInvitation" value="Refuser">
            </form>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

  <?php if ($a == 1): ?>
    <div class="row row-centered">
      <h1>Bienvenue sur le site d'ISEP Bands !</h1>
      <a href="index.php?page=accueil"><img src="Autres/LogoISEPBands.png" width="294.4" height="192" ></a>
    </div>
  <?php endif; ?>
