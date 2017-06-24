<div class="container">

  <div class="row row-centered">
    <?php foreach ($membres as list($id, $prenom, $nom, $photo)): ?>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-centered membreAnnuaire">
        <p><a href="profil/<?php echo $id ?>"><img class="photoAnnuaireMembre" src="<?php echo $photo ?>" /></a></p>
        <p><a href="profil/<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a></p>
      </div>
    <?php endforeach; ?>
  </div>

</div>
