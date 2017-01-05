<?php

  require_once 'Controleurs/controleurGroupes.php';
  $groupe = new controleurGroupes();


?>

<div class="container">
  <div class="row row-centered">
    <?php foreach ($groupes as list($nomGroupe, $nomCreateur, $photoGroupe)): ?>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
        <p><a href="index.php?page=groupe&amp;groupe=<?php echo urlencode($nomGroupe) ?>"><img class="photoGroupe" src="<?php echo $photoGroupe ?>" alt="" /></a></p>
        <p><a href="index.php?page=groupe&amp;groupe=<?php echo urlencode($nomGroupe) ?>"> <?php echo $nomGroupe ?> </a></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>
