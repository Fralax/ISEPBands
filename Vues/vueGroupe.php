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

  <div id="popupAjouteFacebook" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content formFacebookProfil">
        <form action="" method="post" enctype="multipart/form-data">
          <p>Lien vers ton profil : </p>
          <p><input type="text" name="lienFacebook" placeholder="Lien Facebook"></p>
          <p>
            <input id="boutonLienFacebook" type="submit" name="boutonLienFacebook" value="Envoyer">
            <button id="annuler" type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          </p>
        </form>
      </div>
    </div>
  </div>

</div>
