<?php

require_once 'Controleurs/controleurGroupes.php';
$groupe = new controleurGroupes();
$verificationCreateurGroupe = $groupe->verificationCreateurGroupe();

  if ($verificationCreateurGroupe == true) {
    $g = 0;
  }

  foreach ($membres as list($id)) {
    if ($id == $_SESSION['id']) {
      $g = 1;
      break;
    } else{
      $g = 2;
    }
  }

?>

<div class="container">

  <?php foreach ($membresInvites as list($id, $prenom, $nom)): ?>
    <p>
      <?php echo $prenom." ".$nom ?>
    </p>
  <?php endforeach; ?>

  <div class="row row-centered membreGroupe">
    <?php foreach ($membres as list($id, $prenom, $nom, $photo)): ?>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-centered membreGroupe">
        <img class="photoGroupeMembre" src="<?php echo $photo ?>" />
        <a href="index.php?page=profil&id=<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
