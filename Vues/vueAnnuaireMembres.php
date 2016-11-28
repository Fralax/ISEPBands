<div class="container">

  <div class="row row-centered membresAnnuaire">
    <?php foreach ($membres as list($id, $prenom, $nom, $photo)): ?>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-centered membreAnnuaire">
        <img class="photoAnnuaireMembre" src="<?php echo $photo ?>" />
        <a href="index.php?page=profil&amp;id=<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a>
      </div>
    <?php endforeach; ?>
  </div>

</div>

//ceciestuntest
